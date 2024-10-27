<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sach\SuaSachRequest;
use App\Http\Requests\Sach\ThemSachRequest;
use App\Models\Chuong;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\ThongBao;
use App\Models\User;
use App\Notifications\NewBookNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class SachController extends Controller
{
    public $sach;

    public function __construct(Sach $sach)
    {
        $this->sach = $sach;

        // Quyền truy cập view (index, show)
        $this->middleware('permission:sach-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        $this->middleware('permission:sach-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:sach-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        $this->middleware('permission:sach-destroy')->only('destroy');

        $this->middleware('permission:sach-anHien')->only('anHien');
        $this->middleware('permission:sach-capNhat')->only('capNhat');
        $this->middleware('permission:sach-kiemDuyet')->only('kiemDuyet');

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Sach::with('theLoai');

        // Lọc theo chuyên mục
        if ($request->filled('the_loai')) {
            $query->whereIn('the_loai_id', $request->input('the_loai'));
        }
        // Lọc theo khoảng ngày
        if ($request->filled('from_date') && $request->has('to_date')) {
            $query->whereBetween('ngay_dang', [$request->from_date, $request->to_date]);
        }
        // Lọc theo tình trạng kiểm duyệt
        if ($request->filled('kiem_duyet') && $request->input('kiem_duyet') != 'all') {
            $query->where('kiem_duyet', $request->input('kiem_duyet'));
        }
        // Lọc theo tình trạng ẩn hiện
        if ($request->filled('trang_thai') && $request->input('trang_thai') != 'all') {
            $query->where('trang_thai', $request->input('trang_thai'));
        }
        // Kiểm tra vai trò của người dùng
        if ($request->has('sach-cua-tois') && ($user->vai_tros->contains('id', 1))) {
            $query->where('user_id', $user->id);
        } elseif ($user->vai_tros->contains('id', 4)) {
            $query->where('user_id', $user->id);
        } else {
            $query->where('kiem_duyet', '!=', 'ban_nhap');
        }

        $saches = $query->get();
        $theLoais = TheLoai::all();
        return view('admin.sach.index', compact('theLoais', 'saches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $theLoais = TheLoai::query()->get();
        return view('admin.sach.add', compact('theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'noi_dung_nguoi_lon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThemSachRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->all();
            $param['ngay_dang'] = now();
            $param['user_id'] = auth()->id();
            // Thêm ảnh bìa
            if ($request->hasFile('anh_bia_sach')) {
                $filePath = $request->file('anh_bia_sach')->store('uploads/sach', 'public');
            } else {
                $filePath = null;
            }
            $param['anh_bia_sach'] = $filePath;
            // Thêm với 2 trạng thái cho_xac_nhan và ban_nhap
            $statusBtn = $request->input('action') === 'ban_nhap' ? 'ban_nhap' : 'cho_xac_nhan';
            $param['kiem_duyet'] = $statusBtn;
            // Kiểm tra giá khuyến mãi < giá gốc
            $giaGoc = $request->input('gia_goc');
            $giaKhuyenMai = $request->input('gia_khuyen_mai');

            if ($giaKhuyenMai >= $giaGoc) {
                return back()->withErrors(['gia_khuyen_mai' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.'])->withInput();
            }
            // Thêm sách vào database
            $sach = Sach::query()->create($param);
            // Thêm chương đầu tiên
            $chuong = $sach->chuongs()->create([
                'so_chuong' => $request->input('so_chuong'),
                'tieu_de' => $request->input('tieu_de'),
                'noi_dung' => $request->input('noi_dung'),
                'ngay_len_song' => now(),
                'trang_thai' => $request->input('trang_thai_chuong'),
                'sach_id' => $sach->id,
            ]);

            if ($param['kiem_duyet'] === 'cho_xac_nhan') {
                if ($param['trang_thai'] !== 'an') {
                    $adminUsers = User::whereHas('vai_tros', function($query) {
                        $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                    })->get();
                    $url = route('notificationSach', ['id' => $sach->id]);
                    foreach ($adminUsers as $adminUser) {
                        ThongBao::create([
                            'user_id' => $adminUser->id,
                            'tieu_de' => 'Có một cuốn sách mới cần kiểm duyệt',
                            'noi_dung' => 'Cuốn sách "' . $sach->ten_sach . '" đã được thêm với trạng thái "chờ xác nhận".',
                            'url' => $url,
                            'trang_thai' => 'chua_xem',
                            'type' => 'sach',
                        ]);
                        Mail::raw('Cộng tác viên vừa thêm cuốn sách mới "' . $sach->ten_sach . '" với trạng thái: ' . $sach->kiem_duyet . '. Bạn có thể xem sách tại đây: ' . $url, function ($message) use ($adminUser) {
                            $message->to($adminUser->email)
                                ->subject('Thông báo sách mới sách');
                        });
                    }
                }
            }
            return redirect()->route('sach.index')->with('success', 'Thêm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $theLoais = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        $query = Chuong::with('sach')
            ->where('sach_id', $id);

        $mucDoHaiLong = [
            'rat_hay' => ['label' => 'Rất Hay', 'colorClass' => 'bg-success text-white'],
            'hay' => ['label' => 'Hay', 'colorClass' => 'bg-info text-white'],
            'trung_binh' => ['label' => 'Trung Bình', 'colorClass' => 'bg-warning text-white'],
            'te' => ['label' => 'Tệ', 'colorClass' => 'bg-danger text-white'],
            'rat_te' => ['label' => 'Rất Tệ', 'colorClass' => 'bg-dark text-white'],
        ];
        $tongDanhGia = DanhGia::where('sach_id', $id)
            ->join('users', 'danh_gias.user_id', '=', 'users.id')
            ->selectRaw('danh_gias.muc_do_hai_long, COUNT(*) as count, noi_dung, users.ten_doc_gia, danh_gias.created_at')
            ->groupBy('danh_gias.muc_do_hai_long', 'users.ten_doc_gia', 'danh_gias.noi_dung', 'danh_gias.created_at')
            ->get();
        $ketQuaDanhGia = [];
        foreach ($mucDoHaiLong as $key => $value) {
            $ketQuaDanhGia[$key] = [];
        }
        foreach ($tongDanhGia as $danhGia) {
            $ketQuaDanhGia[$danhGia->muc_do_hai_long][] = [
                'noi_dung' => $danhGia->noi_dung,
                'ten_nguoi_danh_gia' => $danhGia->ten_doc_gia,
                'ngay_danh_gia' => $danhGia->created_at->format('d M, Y'),
            ];
        }
        // Lọc theo tình trạng kiểm duyệt
        if ($request->filled('kiem_duyet') && $request->input('kiem_duyet') != 'all') {
            $query->where('kiem_duyet', $request->input('kiem_duyet'));
        }
        // Lọc theo tình trạng ẩn hiện
        if ($request->filled('trang_thai') && $request->input('trang_thai') != 'all') {
            $query->where('trang_thai', $request->input('trang_thai'));
        }
        $chuongs = $query->get();
        $tongSoLuotDanhGia = DanhGia::where('sach_id', $id)->count();
        return view('admin.sach.detail', compact(
            'sach',
            'theLoais',
            'trang_thai',
            'mau_trang_thai',
            'kiem_duyet',
            'tinh_trang_cap_nhat',
            'chuongs',
            'ketQuaDanhGia',
            'tongSoLuotDanhGia',
            'mucDoHaiLong',
            'id'
        ));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $theLoais = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        return view('admin.sach.edit', compact('sach', 'theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'noi_dung_nguoi_lon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuaSachRequest $request, string $id)
    {
        if ($request->isMethod('put')) {
            $param = $request->except('_token', '_method');
            $sach = Sach::query()->findOrFail($id);
            if ($request->hasFile('anh_bia_sach')) {
                if ($sach->anh_bia_sach && Storage::disk('public')->exists($sach->anh_bia_sach)) {
                    Storage::disk('public')->delete($sach->anh_bia_sach);
                }
                $filePath = $request->file('anh_bia_sach')->store('uploads/sach', 'public');
            } else {
                $filePath = $sach->anh_bia_sach;
            }
            $param['anh_bia_sach'] = $filePath;
            $giaGoc = $request->input('gia_goc');
            $giaKhuyenMai = $request->input('gia_khuyen_mai');
            if ($giaKhuyenMai >= $giaGoc) {
                return back()->withErrors(['gia_khuyen_mai' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.'])->withInput();
            }
            if ($sach->kiem_duyet == 'duyet' && $request->input('kiem_duyet') === 'ban_nhap') {
                return back()->withErrors(['kiem_duyet' => 'Không thể lưu sách đã duyệt thành bản nháp.'])->withInput();
            }
            $sach->update($param);
            $sach->kiem_duyet = 'cho_xac_nhan';
            $sach->save();
            if ($param['trang_thai'] !== 'an') {
                $adminUsers = User::whereHas('vai_tros', function($query) {
                    $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                })->get();
                $notificationUrl = route('notificationSach', ['id' => $sach->id]);
                foreach ($adminUsers as $adminUser) {
                    ThongBao::create([
                        'user_id' => $adminUser->id,
                        'tieu_de' => 'Cuốn sách đã được cập nhật',
                        'noi_dung' => 'Cộng tác viên vừa sửa sách "' . $sach->ten_sach . '" với trạng thái cuốn sách là ' . $sach->kiem_duyet . '.',
                        'trang_thai' => 'chua_xem',
                        'url' => $notificationUrl,
                        'type' => 'sach',
                    ]);
                    Mail::raw('Cuốn sách "' . $sach->ten_sach . '" đã được cộng tác viên sửa với trạng thái: ' . $sach->kiem_duyet . '. Bạn có thể xem sách tại đây: ' . $notificationUrl, function ($message) use ($adminUser) {
                        $message->to($adminUser->email)
                            ->subject('Thông báo cập nhật sách');
                    });
                }
            }
            $thongBao = ThongBao::where('url', route('notificationSach', ['id' => $sach->id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
            $newStatus = $request->input('kiem_duyet');
            if ($newStatus !== $sach->kiem_duyet) {
                $contributorId = $sach->user_id;
                $contributor = User::find($contributorId);
                if ($contributor) {
                    Mail::raw('Trạng thái sách "' . $sach->ten_sach . '" của bạn đã được cập nhật bởi admin. Bạn có thể xem sách tại đây: ' . route('notificationSach', ['id' => $sach->id]), function ($message) use ($contributor) {
                        $message->to($contributor->email)
                            ->subject('Thông báo cập nhật trạng thái sách');
                    });
                }
            }
            return redirect()->route('sach.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sach = Sach::query()->findOrFail($id);
        if ($sach->anh_bia_sach && Storage::disk('public')->exists($sach->anh_bia_sach)) {
            Storage::disk('public')->delete($sach->anh_bia_sach);
        }
        foreach ($sach->chuongs as $chuong) {
            $this->xoaNoiDung($chuong->noi_dung);
        }
        $sach->delete();
        $sach->chuongs()->delete();

        return redirect()->route('sach.index')->with('success', 'Xóa thành công');
    }

    private function xoaNoiDung($noidung)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $noidung, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $imgUrl) {
                $path = str_replace(asset(''), '', $imgUrl);
                if (file_exists(public_path($path))) {
                    unlink(public_path($path));
                }
            }
        }
    }

    // Trạng thái
    public function anHien(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];
        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }
        $contact = Sach::find($id);

        if ($contact) {
            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy thể loại'
        ], 404);
    }

    // Tình trạng cập nhật
    public function capNhat(Request $request, $id)
    {
        $capNhat = Sach::find($id);
        if ($capNhat) {
            // Chuyển đổi trạng thái
            $newStatus = $capNhat->tinh_trang_cap_nhat === 'da_full' ? 'tiep_tuc_cap_nhat' : 'da_full';
            $capNhat->tinh_trang_cap_nhat = $newStatus;
            $capNhat->save();

            return response()->json([
                'thanh_cong' => true,
                'trangThai' => Sach::TINH_TRANG_CAP_NHAT[$newStatus],
            ]);
        }
        return response()->json(['thanh_cong' => false], 404);
    }

    // Tình tran kiểm duyệt
    public function kiemDuyet(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $sach = Sach::find($id);
        if ($sach) {
            $currentStatus = $sach->kiem_duyet;
            if (
                // Khi ở trạng thái 'từ chối' không cho phép chuyển về 'chờ xác nhận' hoặc 'duyệt'
                ($currentStatus == 'tu_choi' && in_array($newStatus, ['cho_xac_nhan', 'duyet'])) ||
                // Khi ở trạng thái 'duyệt' không cho phép chuyển về 'từ chối' hoặc 'chờ xác nhận'
                ($currentStatus == 'duyet' && in_array($newStatus, ['tu_choi', 'cho_xac_nhan']))
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }

            $sach->kiem_duyet = $newStatus;
            $sach->save();
            $congTacVien = $sach->user;
            $url = route('notificationSach', ['id' => $sach->id]);
            if ($congTacVien) {
                ThongBao::create([
                    'user_id' => $congTacVien->id,
                    'tieu_de' => 'Trạng thái sách đã được cập nhật',
                    'noi_dung' => 'Cuốn sách "' . $sach->ten_sach . '" của bạn đã được ' . ($newStatus == 'duyet' ? 'duyệt' : 'từ chối') . '.',
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'sach',
                ]);
                Mail::raw('Cuốn sách "' . $sach->ten_sach . '" của bạn đã được ' . ($newStatus == 'duyet' ? 'duyệt' : 'từ chối') . '. Bạn có thể xem chi tiết chương tại đây: ' . $url, function ($message) use ($congTacVien) {
                    $message->to($congTacVien->email)
                        ->subject('Thông báo trạng thái kiểm duyệt sách');
                });
            }
            $thongBao = ThongBao::where('url', route('notificationSach', ['id' => $sach->id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
            if ($newStatus === 'duyet') {
                $khachHangIds = DonHang::where('sach_id', $sach->id)->pluck('user_id');

                foreach ($khachHangIds as $khachHangId) {
                    $khachHang = User::find($khachHangId);
                    if ($khachHang) {
                        ThongBao::create([
                            'user_id' => $khachHang->id,
                            'tieu_de' => 'Thông báo cuốn sách đã được cập nhật',
                            'noi_dung' => 'Cuốn sách "' . $sach->ten_sach . '" mà bạn đã mua đã được cập nhật lại. Bạn có thể xem lại sách .',
                            'url' => null,
                            'trang_thai' => 'chua_xem',
                            'type' => 'sach',
                        ]);

                        Mail::raw('Cuốn sách "' . $sach->ten_sach . '"mà bạn đã mua đã được cập nhật lại. Bạn có thể xem lại sách .', function ($message) use ($khachHang) {
                            $message->to($khachHang->email)
                                ->subject('Thông báo cuốn sách đã được cập nhật');
                        });
                    }
                }
            }

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Sách không tồn tại.'], 404);
    }

    public function notificationSach(Request $request, $idSach = null)
    {
        $user = auth()->user();
        $saches = Sach::with('theLoai');
        if ($request->filled('the_loai_id')) {
            $saches->where('the_loai_id', $request->the_loai_id);
        }
        if ($request->has('from_date') && $request->has('to_date')) {
            $saches->whereBetween('ngay_dang', [$request->from_date, $request->to_date]);
        }
        if ($request->has('sach-cua-tois') && ($user->vai_tros->contains('id', 1) || $user->vai_tros->contains('id', 3))) {
            $saches->where('user_id', $user->id);
        } elseif ($user->vai_tros->contains('id', 4)) {
            $saches->where('user_id', $user->id);
        } else {
            $saches->where('kiem_duyet', '!=', 'ban_nhap');
        }
        if (isset($idSach)) {
            $saches = $saches->where('id', $idSach)->get();
        } else {
            $saches = $saches->get();
        }
        $theLoais = TheLoai::all();
        return view('admin.sach.index', compact('theLoais', 'saches'));
    }

}
