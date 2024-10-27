<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chuong\SuaChuongRequest;
use App\Http\Requests\Chuong\ThemChuongRequest;
use App\Models\Chuong;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\ThongBao;
use App\Models\User;
use App\Notifications\ChuongNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:chuong-show')->only(['index', 'showChuong']);

        // Quyền tạo (create, store)
        $this->middleware('permission:chuong-create')->only(['createChuong', 'storeChuong']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:chuong-update')->only(['editChuong', 'updateChuong']);

        // Quyền xóa (destroy)
        $this->middleware('permission:chuong-destroy')->only('destroyChuong');
    }
    public function index(Request $request)
    {
        $query = Chuong::with('sach')->where('kiem_duyet', '!=', 'ban_nhap');
        // Lọc theo tình trạng kiểm duyệt
        if ($request->filled('kiem_duyet') && $request->input('kiem_duyet') != 'all') {
            $query->where('kiem_duyet', $request->input('kiem_duyet'));
        }
        // Lọc theo tình trạng ẩn hiện
        if ($request->filled('trang_thai') && $request->input('trang_thai') != 'all') {
            $query->where('trang_thai', $request->input('trang_thai'));
        }
        $chuongs = $query->get();
        return view('admin.chuong.index', compact('chuongs'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createChuong(string $sachId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $sach = Sach::query()->findOrFail($sachId);
        return view('admin.chuong.add', compact('trang_thai', 'kiem_duyet', 'noi_dung_nguoi_lon', 'mau_trang_thai', 'sach'));
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeChuong(ThemChuongRequest $request, string $sachId)
    {
        $sach = Sach::findOrFail($sachId);
        // Thêm với 2 trạng thái cho_xac_nhan và ban_nhap
        $statusBtn = $request->input('action') === 'ban_nhap' ? 'ban_nhap' : 'cho_xac_nhan';
        $chuong = $sach->chuongs()->create([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'ngay_len_song' => now(),
            'trang_thai' => $request->input('trang_thai_chuong'),
            'kiem_duyet' =>  $statusBtn,
        ]);

        if ($chuong->kiem_duyet === 'cho_xac_nhan') {
            if ($chuong->trang_thai !== 'an') {
                $adminUsers = User::whereHas('vai_tros', function($query) {
                    $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                })->get();
                $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);
                foreach ($adminUsers as $adminUser) {
                    ThongBao::create([
                        'user_id' => $adminUser->id,
                        'tieu_de' => 'Có một chương mới cần kiểm duyệt',
                        'noi_dung' => 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" đã được thêm với trạng thái "chờ xác nhận".',
                        'url' => $url,
                        'trang_thai' => 'chua_xem',
                        'type' => 'sach',
                    ]);
                    Mail::raw('Cuốn sách "' . $sach->ten_sach . '" đã được cộng tác viên thêm chương mới "' . $chuong->tieu_de . '" với trạng thái: ' . $chuong->kiem_duyet . '. Bạn có thể xem chương sách tại đây: ' . $url, function ($message) use ($adminUser) {
                        $message->to($adminUser->email)
                            ->subject('Thông báo thêm chương sách mới');
                    });
                }
            }
        }
        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được thêm thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function showChuong(string $sachId,string $chuongId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        return view('admin.chuong.detail', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editChuong(string $sachId,string $chuongId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        return view('admin.chuong.edit', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateChuong(SuaChuongRequest $request, string $sachId, string $chuongId)
    {
        $sach = Sach::findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);
        $statusBtn = $request->input('action') === 'ban_nhap' ? 'ban_nhap' : 'cho_xac_nhan';
        $chuong->update([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'kiem_duyet' => $statusBtn,
        ]);
        if ($chuong->kiem_duyet === 'cho_xac_nhan') {
            if ($chuong->trang_thai !== 'an') {
                $adminUsers = User::whereHas('vai_tros', function($query) {
                    $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                })->get();
                $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);
                foreach ($adminUsers as $adminUser) {
                    ThongBao::create([
                        'user_id' => $adminUser->id,
                        'tieu_de' => 'Có một chương mới cần kiểm duyệt',
                        'noi_dung' => 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" đã được sửa với trạng thái "chờ xác nhận".',
                        'url' => $url,
                        'trang_thai' => 'chua_xem',
                        'type' => 'sach',
                    ]);
                    Mail::raw('Cuốn sách "' . $sach->ten_sach . '" đã được cộng tác viên sửa chương "' . $chuong->tieu_de . '" với trạng thái: ' . $chuong->kiem_duyet . '. Bạn có thể xem chương sách tại đây: ' . $url, function ($message) use ($adminUser) {
                        $message->to($adminUser->email)
                            ->subject('Thông báo cộng tác viên vừa sửa chương sách');
                    });
                }

                if ($statusBtn === 'duyet') {
                    $khachHangIds = DonHang::where('sach_id', $sach->id)->pluck('user_id');
                    foreach ($khachHangIds as $khachHangId) {
                        $khachHang = User::find($khachHangId);
                        if ($khachHang) {
                            ThongBao::create([
                                'user_id' => $khachHang->id,
                                'tieu_de' => 'Thông báo chương sách được cập nhật',
                                'noi_dung' => 'Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được cập nhật chương "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.',
                                'url' => $url,
                                'trang_thai' => 'chua_xem',
                                'type' => 'sach',
                            ]);

                            Mail::raw('Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được cập nhật chương "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.', function ($message) use ($khachHang) {
                                $message->to($khachHang->email)
                                    ->subject('Thông báo chương sách được cập nhật');
                            });
                        }
                    }
                }
                $contributor = User::find($sach->user_id);
                if ($contributor) {
                    Mail::raw('Chương "' . $chuong->tieu_de . '" của sách "' . $sach->ten_sach . '" đã được kiểm duyệt với trạng thái: ' . $chuong->kiem_duyet . '.', function ($message) use ($contributor) {
                        $message->to($contributor->email)
                            ->subject('Thông báo trạng thái kiểm duyệt chương sách');
                    });
                }
            }
        }

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyChuong(string $sachId, string $chuongId)
    {
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);
        $noidung = $chuong->noi_dung;
        $this->xoaNoiDung($noidung);
        $chuong->delete();

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được xóa thành công!');
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
        $contact = Chuong::find($id);

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
            'message' => 'Không tìm thấy chương'
        ], 404);
    }

    // Tình tran kiểm duyệt
    public function kiemDuyet(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $chuong = Chuong::find($id);
        if ($chuong) {
            $sach = $chuong->sach;
            $currentStatus = $chuong->kiem_duyet;
            if (
                ($currentStatus == 'tu_choi' && in_array($newStatus, ['cho_xac_nhan', 'duyet'])) ||
                ($currentStatus == 'duyet' && in_array($newStatus, ['tu_choi', 'cho_xac_nhan']))
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }
            $chuong->kiem_duyet = $newStatus;
            $chuong->save();

            $congTacVien = $sach->user;
            if ($congTacVien) {
                $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);

                ThongBao::create([
                    'user_id' => $congTacVien->id,
                    'tieu_de' => 'Trạng thái chương sách đã được cập nhật',
                    'noi_dung' => 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" của bạn đã được ' . ($newStatus == 'duyet' ? 'duyệt' : 'từ chối') . '.',
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'sach',
                ]);

                Mail::raw('Chương "' . $chuong->tieu_de . '" trong sách "' . $sach->ten_sach . '" của bạn đã được ' . ($newStatus == 'duyet' ? 'duyệt' : 'từ chối') . '. Bạn có thể xem chi tiết chương tại đây: ' . $url, function ($message) use ($congTacVien) {
                    $message->to($congTacVien->email)
                        ->subject('Thông báo trạng thái kiểm duyệt chương sách');
                });
            }
            if ($newStatus === 'duyet') {
                $khachHangIds = DonHang::where('sach_id', $sach->id)->pluck('user_id');
                foreach ($khachHangIds as $khachHangId) {
                    $khachHang = User::find($khachHangId);
                    if ($khachHang) {
                        ThongBao::create([
                            'user_id' => $khachHang->id,
                            'tieu_de' => 'Thông báo chương sách mới',
                            'noi_dung' => 'Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được thêm chương mới "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.',
                            'url' => $url,
                            'trang_thai' => 'chua_xem',
                            'type' => 'sach',
                        ]);
                        Mail::raw('Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được thêm chương mới "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.',
                            function ($message) use ($khachHang) {
                                $message->to($khachHang->email)
                                ->subject('Thông báo chương sách mới');
                        });
                    }
                }
            }
            $thongBao = ThongBao::where('url', route('notificationSach', ['id' => $sach->id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Chương không tồn tại.'], 404);
    }



}
