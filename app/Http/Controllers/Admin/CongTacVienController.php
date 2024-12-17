<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\NewCashoutReqestEmail;
use App\Models\BaiViet;
use App\Models\Commission;
use App\Models\ContributorCommissionEarning;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\LuuThongTinTaiKhoan;
use App\Models\RutTien;
use App\Models\Sach;
use App\Models\ThongBao;
use App\Models\User;
use App\Models\YeuThich;

//use App\Notifications\RutTienCTVNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Builder;

// Import Str từ Laravel


class CongTacVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:thong-ke-chung-cong-tac-vien')->only('thongKeChungCTV');
        $this->middleware('permission:rut-tien')->only('rutTien');
    }

    public function show($id)
    {
        $user = User::with('sach')->findOrFail($id);
        $sach = Sach::where('user_id', $user->id)
            ->with('tai_khoan')
            ->get();
        $user->sinh_nhat = \Carbon\Carbon::parse($user->sinh_nhat)->format('d-m-Y');
        return view('admin.cong-tac-vien.detail', compact('user', 'sach'));
    }

    public function thongKeChungCTV()
    {
        $ten = Auth::user()->ten_doc_gia;
        // Tổng doanh số của tài khoản ctv theo thang
        $tongDoanhSo = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('so_tien_thanh_toan');
        $tongDoanhSoTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('so_tien_thanh_toan');
        $phanTramDS = 0;
        if ($tongDoanhSoTruoc > 0) {
            $phanTramDS = (($tongDoanhSo - $tongDoanhSoTruoc) / $tongDoanhSoTruoc) * 100;
        } elseif ($tongDoanhSoTruoc == 0) {
            $phanTramDS = $tongDoanhSo > 0 ? 100 : 0;
        }
        // Tổng hoa hồng theo thag
        // tính tổng hoa hồng như sau: 1 đơn hàng tương ứng 1 cuốn sách
        // mà mỗi cuốn sách lại có giá bán khác nhau hơn nữa đang tính hh của sách mà ctv đang đăng nhập
        // => dùng Auth để lây ra tk ctv đang đăng nhập sau đó dùng sum (tính tổng) hh cho từng đơn hàng
        // so_tien_thanh_toan từ bảng đơn hàng nhân 0.6 tức 60%
        // Kiểm tra tỷ lệ hoa hồng
        $taiKhoanHoaHong = Auth::id();
        $hoaHongRate = ContributorCommissionEarning::where('user_id', $taiKhoanHoaHong)->value('commission_rate');
        if ($hoaHongRate === null) {
            $hoaHongRate = 0;
        }
        if ($hoaHongRate > 1) {
            $hoaHongRate = $hoaHongRate / 100;
        }
        $tongHoaHong = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) use ($taiKhoanHoaHong) {
                $query->where('saches.user_id', $taiKhoanHoaHong);
            })
            ->whereMonth('don_hangs.created_at', Carbon::now()->month)
            ->whereYear('don_hangs.created_at', Carbon::now()->year)
            ->join('contributor_commission_earnings', 'don_hangs.id', '=', 'contributor_commission_earnings.id_don_hang')
            ->sum('contributor_commission_earnings.commission_amount');


        $tongHoaHongTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) use ($taiKhoanHoaHong) {
                $query->where('user_id', $taiKhoanHoaHong);
            })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->get()
            ->sum(function ($donHang) use ($hoaHongRate) {
                return $donHang->so_tien_thanh_toan * $hoaHongRate;
            });
        $phanTramHH = 0;
        if ($tongHoaHongTruoc > 0) {
            $phanTramHH = (($tongHoaHong - $tongHoaHongTruoc) / $tongHoaHongTruoc) * 100;
        } elseif ($tongHoaHongTruoc == 0) {
            $phanTramHH = $tongHoaHong > 0 ? 100 : 0;
        }
        // Đánh giá
        $tongSoDanhGia = DanhGia::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereHas('sach.dh', function ($query) {
                $query->where('trang_thai', 'thanh_cong')
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
            })
            ->count();
        $tongSoDanhGiaTruoc = DanhGia::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereHas('sach.dh', function ($query) {
                $query->where('trang_thai', 'thanh_cong')
                    ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                    ->whereYear('created_at', Carbon::now()->subMonth()->year);
            })
            ->count();
        $phanTramDG = 0;
        if ($tongSoDanhGiaTruoc > 0) {
            $phanTramDG = (($tongSoDanhGia - $tongSoDanhGiaTruoc) / $tongSoDanhGiaTruoc) * 100;
        } elseif ($tongSoDanhGiaTruoc == 0) {
            $phanTramDG = $tongSoDanhGia > 0 ? 100 : 0;
        }
        // Đơn hàng
        $tongDonDaBan = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $tongDonDaBanTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();
        $phanTramDDB = 0;
        if ($tongDonDaBanTruoc > 0) {
            $phanTramDDB = (($tongDonDaBan - $tongDonDaBanTruoc) / $tongDonDaBanTruoc) * 100;
        } elseif ($tongDonDaBanTruoc == 0) {
            $phanTramDDB = $tongDonDaBan > 0 ? 100 : 0;
        }
        // Yêu thích
        $tongYeuThich = YeuThich::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $tongYeuThichTruoc = YeuThich::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();
        $phanTramYeuThich = 0;
        if ($tongYeuThichTruoc > 0) {
            $phanTramYeuThich = (($tongYeuThich - $tongYeuThichTruoc) / $tongYeuThichTruoc) * 100;
        } elseif ($tongYeuThichTruoc == 0) {
            $phanTramYeuThich = $tongYeuThich > 0 ? 100 : 0;
        }
        // Top 5 sách bán chạy của ctv đó
        $hoaHongRate1 = ContributorCommissionEarning::where('user_id', Auth::id())->value('commission_rate');
        if (!$hoaHongRate1) {
            $hoaHongRate1 = 0;
        }
        if ($hoaHongRate1 > 1) {
            $hoaHongRate1 = $hoaHongRate1 / 100; // Convert percentage to decimal if it's greater than 1
        }

        $topSach = Sach::where('user_id', Auth::id())
            ->withCount(['dh' => function ($query) {
                $query->where('trang_thai', 'thanh_cong');
            }]) // Count the successful orders
            ->addSelect(['total_loinhuan' => function ($query) use ($hoaHongRate1) {
                $query->from('don_hangs')
                    ->join('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                    ->whereColumn('don_hangs.sach_id', 'saches.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->where('contributor_commission_earnings.user_id', Auth::id())
                    ->selectRaw('SUM(contributor_commission_earnings.commission_amount) as total_loinhuan');
            }])
            ->orderBy('dh_count', 'desc')
            ->get();
        // Biểu đồ
        $nam = Carbon::now()->year;
        $hoaHongRate = ContributorCommissionEarning::where('user_id', Auth::id())->value('commission_rate');
        if (!$hoaHongRate) {
            $hoaHongRate = 0;
        }
        if ($hoaHongRate > 1) {
            $hoaHongRate = $hoaHongRate / 100;
        }

        $bieuDo = DonHang::where('don_hangs.trang_thai', 'thanh_cong') // Chỉ rõ bảng cho cột 'trang_thai'
        ->join('saches', 'saches.id', '=', 'don_hangs.sach_id') // Join bảng 'saches'
        ->join('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id') // Join bảng 'contributor_commission_earnings'
        ->where('saches.user_id', Auth::id()) // Điều kiện cho sách thuộc về người dùng hiện tại
        ->where('contributor_commission_earnings.user_id', Auth::id()) // Điều kiện cho hoa hồng thuộc về người dùng hiện tại
        ->whereYear('don_hangs.created_at', $nam) // Lọc theo năm, chỉ rõ bảng
        ->selectRaw('MONTH(don_hangs.created_at) as thang, sach_id, SUM(contributor_commission_earnings.commission_amount) as hoa_hong') // Chọn ra tháng, id sách và tổng hoa hồng
        ->groupBy('thang', 'sach_id') // Nhóm theo tháng và sách
        ->orderBy('thang') // Sắp xếp theo tháng
        ->get();

        $bd = array_fill(0, 12, 0);
        foreach ($bieuDo as $item) {
            $thang = $item->thang;
            $hoaHong = $item->hoa_hong;

            $bd[$thang - 1] += $hoaHong;
        }
        $bieuDo = [
            [
                'name' => 'Tổng Hoa Hồng',
                'data' => $bd
            ]
        ];

        return view('admin.thong-ke.thong-ke-chung-ctv', compact(
            'ten',
            'tongDoanhSo',
            'phanTramDS',
            'tongHoaHong',
            'phanTramHH',
            'tongSoDanhGia',
            'phanTramDG',
            'tongDonDaBan',
            'phanTramDDB',
            'tongYeuThich',
            'phanTramYeuThich',
            'topSach',
            'bieuDo'
        ));
    }

    public function rutTien()
    {
        $accountInfo = LuuThongTinTaiKhoan::where('user_id', auth()->id())->first() ?? null;
        $user = auth()->user();
        $listRutTien = RutTien::with('user')
            ->where('cong_tac_vien_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();

        $dataForGridJs = $listRutTien->map(function ($item) {
            return [
                'id' => $item->id,
                'created_at' => $item->created_at ? $item->created_at->format('Y-m-d H:i:s') : 'N/A', // Sử dụng created_at thay vì ngay_yeu_cau
                'so_tien' => number_format($item->so_tien, 0) . ' VNĐ',
                'trang_thai' => $item->trang_thai,

                'ten_ngan_hang' => $item->ten_ngan_hang,
                'so_tai_khoan' => $item->so_tai_khoan,
                'ten_chu_tai_khoan' => $item->ten_chu_tai_khoan,
                'ghi_chu' => $item->ghi_chu,
                'ma_yeu_cau' => $item->ma_yeu_cau,
                'anh_qr' => $item->anh_qr,
            ];
        });
        $soDu = $user->so_du;
        return view('admin.cong-tac-vien.rut-tien', compact('dataForGridJs', 'soDu', 'accountInfo'));
    } // sàm trả dữ liệu cho modal để nhập thông tin rút tiền

    public function checkSD()
    {
        $user = auth()->user();
        $soDu = $user->so_du;

        $requestInProgress = RutTien::where('cong_tac_vien_id', $user->id)
            ->where('trang_thai', 'dang_xu_ly')
            ->exists();

        $startOfWeek = Carbon::now()->startOfWeek(); // Thứ 2 đầu tuần
        $endOfWeek = Carbon::now()->endOfWeek();    // Chủ nhật cuối tuần

        // Tổng số tiền đã rút trong tuần này
        $totalWithdrawn = DB::table('rut_tiens')
            ->where('cong_tac_vien_id', $user->id)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->sum('so_tien');

        if ($soDu < 100000) {
            return response()->json(['success' => false, 'message' => 'Số dư tối thiểu để rút là 100.000 VNĐ !']);
        } elseif ($requestInProgress) {
            return response()->json(['success' => false, 'message' => 'Bạn đang có một yêu cầu chờ xử lý, thử lại sau khi yêu cầu hoàn thành.']);
        } elseif (!$this->checkDailyLimit($user->id, 3)) {
            return response()->json(['success' => false, 'message' => 'Bạn đã vượt quá 3 lần rút/ngày']);
        } elseif ($totalWithdrawn > 30000000) {
            return response()->json(['success' => false, 'message' => 'Bạn đã đạt giới hạn rút 30.000.000/ngày']);
        }
        return response()->json(['success' => true, 'message' => 'ok']);
    }

    public function notificationRutTien(Request $request, $id = null)
    {
        $danhSachYeuCauQuery = RutTien::with('user');
        if (isset($id)) {
            $danhSachYeuCau = $danhSachYeuCauQuery->where('id', $id)->get();

            $thongBao = ThongBao::where('url', route('notificationRutTien', ['id' => $id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
        } else {
            $danhSachYeuCau = $danhSachYeuCauQuery->get();
        }
        return view('admin.cong-tac-vien.yeu-cau-rut-tien', compact('danhSachYeuCau'));
    }

    public function capNhatYeuCau(Request $request)
    {
        $validated = $request->validate([
            'ten_ngan_hang' => 'required|string|max:255',
            'so_tai_khoan' => 'required|string|max:255',
            'ten_chu_tai_khoan' => 'required|string|max:255',
            'anh_qr' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $accountInfo = LuuThongTinTaiKhoan::where('user_id', auth()->id())->first() ?? null;
        if (!$accountInfo) {
            $accountInfo = new LuuThongTinTaiKhoan();
            $accountInfo->user_id = auth()->user()->id;
        }

        $accountInfo->ten_ngan_hang = $validated['ten_ngan_hang'];
        $accountInfo->so_tai_khoan = $validated['so_tai_khoan'];
        $accountInfo->ten_chu_tai_khoan = $validated['ten_chu_tai_khoan'];

        if ($request->hasFile('anh_qr')) {
            $path = $request->file('anh_qr')->store('anh_qr', 'public');
            $accountInfo->anh_qr = $path;
        }

        $accountInfo->save();
        return redirect()->back()->with('success', 'Thông tin tài khoản rút tiền đã được cập nhật!');
    }

    public function chiTietYeuCau($id)
    {
        $request = RutTien::find($id);

        if (!$request) {
            return response()->json(['message' => 'Yêu cầu không tồn tại'], 404);
        }

        return response()->json([
            'id' => $request->id,
            'created_at' => $request->created_at->format('Y-m-d H:i:s'),
            'so_tien' => number_format($request->so_tien, 0) . ' VNĐ',
            'trang_thai' => $request->trang_thai,
            'ten_ngan_hang' => $request->ten_ngan_hang,
            'so_tai_khoan' => $request->so_tai_khoan,
            'ten_chu_tai_khoan' => $request->ten_chu_tai_khoan,
            'ghi_chu' => $request->ghi_chu,
            'ma_yeu_cau' => $request->ma_yeu_cau,
            'anh_ket_qua' => $request->anh_ket_qua ? Storage::url($request->anh_ket_qua) : null,
            'anh_qr' => $request->anh_qr ? Storage::url($request->anh_qr) : null,
            'ly_do_tu_choi' => $request->ly_do_tu_choi ?: null,
        ]);
    }

    public function huyYeuCauRut($id)
    {
        // Tìm yêu cầu rút tiền theo id
        $yc = RutTien::query()->findOrFail($id);

        // Kiểm tra nếu yêu cầu đang xử lý
        if ($yc->trang_thai === 'dang_xu_ly') {

            // Kiểm tra nếu yêu cầu được tạo trong vòng 1 ngày
            $createdAt = $yc->created_at;  // Thời gian tạo yêu cầu
            $now = now();  // Thời gian hiện tại

            // So sánh thời gian tạo với thời gian hiện tại
            if ($createdAt->diffInDays($now) < 1) {  // Nếu được tạo trong vòng 1 ngày
                $yc->trang_thai = 'da_huy';  // Đổi trạng thái thành "đã hủy"
                $yc->save();  // Lưu thay đổi vào cơ sở dữ liệu
            } else {
                // Nếu yêu cầu đã được tạo quá 1 ngày, trả về thông báo lỗi
                return response()->json([
                    'error' => 'Không thể hủy yêu cầu. Yêu cầu đã được tạo quá 1 ngày.'
                ], 400);  // Trả về lỗi 400 nếu không thể hủy yêu cầu
            }

        } else {
            // Nếu trạng thái không phải là "đang xử lý", trả về thông báo lỗi hoặc xử lý logic khác
            return response()->json([
                'error' => 'Không thể hủy yêu cầu. Yêu cầu này đã được xử lý hoặc không hợp lệ.'
            ], 400);  // Trả về lỗi 400 nếu không thể hủy yêu cầu
        }

        // Trả về thông tin yêu cầu sau khi cập nhật
        return response()->json(['success' => true]);
    }


    public function checkDailyLimit($userId, $dailyLimit): bool
    {
        $today = Carbon::today();

        $dailyCount = DB::table('rut_tiens')
            ->where('cong_tac_vien_id', $userId)
            ->whereDate('created_at', $today)
            ->where('trang_thai', 'da_duyet')
            ->count();

        return $dailyCount < $dailyLimit;
    }

    public function checkWeeklyLimit($userId, $amount, $weeklyLimit): bool
    {
        // Xác định khoảng thời gian đầu tuần và cuối tuần
        $startOfWeek = Carbon::now()->startOfWeek(); // Thứ 2 đầu tuần
        $endOfWeek = Carbon::now()->endOfWeek();    // Chủ nhật cuối tuần

        // Tổng số tiền đã rút trong tuần này
        $totalWithdrawn = DB::table('rut_tiens')
            ->where('cong_tac_vien_id', $userId)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->sum('so_tien');

        // Kiểm tra nếu tổng số tiền (đã rút + đang muốn rút) vượt hạn mức
        if (($totalWithdrawn + $amount) > $weeklyLimit) {
            return false; // Vượt hạn mức
        }

        return true; // Hợp lệ
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse // hàm xử lý rút tiền
    {
        $request->validate([
            'bank-name-input' => 'required',
            'account-number-input' => 'required',
            'recipient-name-input' => 'required',
            'amount-input' => 'required|numeric|min:100000',
            'g-recaptcha-response' => 'required',
        ]);
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $today = Carbon::today();

        $weeklyLimit = 30000000; // Hạn mức rút tối đa trong tuần

        $dailyLimit = 3; // Số lần rút tối đa trong ngày
        $userId = auth()->user()->id;

        $soDu = auth()->user()->so_du;
        $soTien = $request->input('amount-input');
        $totalWithdrawn = DB::table('rut_tiens')
            ->where('cong_tac_vien_id', $userId)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->sum('so_tien');
        $final = $weeklyLimit - $totalWithdrawn;


        $dailyCount = DB::table('rut_tiens')
            ->where('cong_tac_vien_id', $userId)
            ->whereDate('created_at', $today)
            ->count();

        //nếu số tiền rút nhỏ hơn 100.000
        if ($soTien < 100000) {
            return redirect()->back()->with('error', 'Số tiền tối thiểu để rút là 100,000 VNĐ.');
        }

        //nếu số lượt rút lớn hơn 3
        if (!$this->checkDailyLimit($userId, $dailyLimit)) {
            return redirect()->back()->with(['error' => 'Bạn đã vượt quá số lần có thể rút trong 1 ngày (3 lượt), Bạn đã rút ' . $dailyCount . '/3 lượt ngày hôm nay'], 400);
        }

        //Nếu số tiền rút lớn hơn giới hạn 1 tuần
        if (!$this->checkWeeklyLimit($userId, $request->input('amount-input'), $weeklyLimit)) {
            return redirect()->back()->with(['error' => 'Bạn đã vượt quá số tiền có thể rút trong 1 tuần (Số tiền còn có thể rút trong tuần này: ' . number_format($final, 0, ',', '.') . ' VNĐ'], 400);
        }

        //nếu số dư nhỏ hơn số tiền
        if ($soDu < $soTien) {
            return redirect()->back()->with('error', 'Số dư của bạn không đủ để rút ' . number_format($soTien, 0, ',', '.') . ' VNĐ.');
        }

        // chặn thực thi 2 tab
        $existingRequest = RutTien::where('cong_tac_vien_id', auth()->user()->id)
            ->where('trang_thai', 'dang_xu_ly') // Kiểm tra trạng thái chưa hoàn tất
            ->exists();

        // chặn thực thi 2 tab
        if ($existingRequest) {
            return redirect()->back()->with('error', 'Bạn đã có một yêu cầu rút tiền đang được xử lý. Vui lòng chờ đến khi hoàn tất.');
        }

        $taiKhoan = auth()->user()->taiKhoan()->firstOrNew(['user_id' => auth()->user()->id]);

        // Cập nhật thông tin tài khoản ngân hàng
        $taiKhoan->fill([
            'ten_chu_tai_khoan' => $request->input('recipient-name-input'),
            'ten_ngan_hang' => $request->input('bank-name-input'),
            'so_tai_khoan' => $request->input('account-number-input'),
        ]);

        if ($request->hasFile('qr-code-input')) {
            $taiKhoan->anh_qr = $request->file('qr-code-input')->store('anh_qr', 'public');
        }

        $taiKhoan->save();

        // Tạo yêu cầu rút tiền
        $withdrawal = new RutTien();
        $withdrawal->fill([
            'cong_tac_vien_id' => auth()->user()->id,
            'ten_chu_tai_khoan' => $taiKhoan->ten_chu_tai_khoan,
            'ten_ngan_hang' => $taiKhoan->ten_ngan_hang,
            'so_tai_khoan' => $taiKhoan->so_tai_khoan,
            'so_tien' => $soTien,
            'trang_thai' => 'dang_xu_ly',
            'ghi_chu' => $request->input('ghi_chu', ''),
            'anh_qr' => $taiKhoan->anh_qr,
        ]);

        // Tạo mã yêu cầu duy nhất
        do {
            $maYeuCau = Str::random(10);
        } while (RutTien::where('ma_yeu_cau', $maYeuCau)->exists());

        $withdrawal->ma_yeu_cau = $maYeuCau;

        $withdrawal->save();

        $adminUsers = User::whereHas('vai_tros', function ($query) {
            $query->whereIn('ten_vai_tro', ['admin']);
        })->get();

        foreach ($adminUsers as $adminUser) {
            $notification = ThongBao::create([
                'user_id' => $adminUser->id,
                'tieu_de' => 'Yêu cầu rút tiền mới',
                'noi_dung' => 'Yêu cầu rút tiền từ tài khoản "' . auth()->user()->ten_doc_gia . '" với số tiền ' . number_format($soTien, 0, ',', '.') . ' VNĐ đang chờ xử lý.',
                'url' => route('notificationRutTien', ['id' => $withdrawal->id]),
                'trang_thai' => 'chua_xem',
                'type' => 'tien',
            ]);

            broadcast(new NotificationSent($notification));

            $url = route('notificationRutTien', ['id' => $withdrawal->id]);
            NewCashoutReqestEmail::dispatch($adminUser, auth()->user()->ten_doc_gia, $withdrawal->so_tien, $url);
        }

        return redirect()->back()->with('success', 'Yêu cầu rút tiền đã được gửi thành công.');
    }


}
