<?php

namespace App\Http\Controllers\Client;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\ChuyenMuc;
use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BaiVietController extends Controller
{
    public function filterByChuyenMuc(Request $request, $id = null)
    {
        $chuyenMucs = ChuyenMuc::with(['chuyenMucCons' => function ($query) {
            $query->where('trang_thai', 'hien')
                ->with(['chuyenMucCons' => function ($query) {
                    $query->where('trang_thai', 'hien');
                }]);
        }])
            ->whereNull('chuyen_muc_cha_id')
            ->where('trang_thai', 'hien')
            ->get();

        $currentChuyenMuc = null;
        if ($id) {
            $currentChuyenMuc = ChuyenMuc::where('trang_thai', 'hien')->findOrFail($id);
        }

        $filter = $request->get('filter');

        $baiViets = BaiViet::with('tacGia')->where('trang_thai', BaiViet::HIEN)
            ->when($id, function ($query) use ($id) {
                $query->where('chuyen_muc_id', $id);
            });

        if ($filter === 'new-chap') {
            $baiViets->orderBy('ngay_dang', 'desc');
        }

        // Thực hiện truy vấn
        $baiViets = $baiViets->get();

        // Lấy top 10 bài viết được bình luận nhiều nhất trong chuyên mục
        $topBaiViets = BaiViet::withCount(['binhLuans' => function ($query) {
            $query->where('trang_thai', BinhLuan::HIEN);
        }])
            ->where('trang_thai', BaiViet::HIEN)
            ->when($id, function ($query) use ($id) {
                $query->where('chuyen_muc_id', $id);
            })
            ->having('binh_luans_count', '>', 0)
            ->orderBy('binh_luans_count', 'desc')
            ->take(10)
            ->get();

        return view('client.pages.bai-viet', compact(
            'chuyenMucs',
            'baiViets',
            'currentChuyenMuc',
            'topBaiViets'
        ));
    }

    public function show($id)
    {
        $baiViet = BaiViet::with(['chuyenMuc', 'tacGia', 'binhLuans' => function ($query) {
            $query->where('trang_thai', BinhLuan::HIEN);
        }, 'binhLuans.user'])
            ->findOrFail($id);

        if (!$baiViet) {
            abort(404, 'Trang khong ton tai.');
        }

        if ($baiViet->trang_thai != BaiViet::HIEN) {
            abort(403, 'Bài viết đã bị ẩn.');
        }

        return view('client.pages.chi-tiet-bai-viet', compact('baiViet'));
    }

    public function addComment(Request $request, $baiVietId)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn cần đăng nhập để bình luận.'], 401);
        }

        $request->validate([
            'noi_dung' => 'required|string|max:500',
        ]);

        $baiViet = BaiViet::findOrFail($baiVietId);

        $binhLuan = $baiViet->binhLuans()->create([
            'noi_dung' => $request->noi_dung,
            'user_id' => auth()->id(),
            'ngay_binh_luan' => now(),
            'trang_thai' => BinhLuan::HIEN,
        ]);

        $adminUsers = User::whereHas('vai_tros', function ($query) {
            $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
        })->get();

        $url = route('notificationBinhLuan', ['id' => $binhLuan->id]);

        foreach ($adminUsers as $adminUser) {
            $adminNotification = ThongBao::create([
                'user_id' => $adminUser->id,
                'tieu_de' => 'Có bình luận mới cho bài viết "' . $baiViet->tieu_de . '"',
                'noi_dung' => 'Người dùng "' . auth()->user()->ten_doc_gia . '" đã bình luận: ' . $request->noi_dung . '.',
                'trang_thai' => 'chua_xem',
                'url' => $url,
                'type' => 'chung',
            ]);
            broadcast(new NotificationSent($adminNotification));
            Mail::raw('Người dùng "' . auth()->user()->ten_doc_gia . '" đã bình luận trên bài viết "' . $baiViet->tieu_de . '" với nội dung: "' . $request->noi_dung . '". Bạn hãy kiểm tra tại đây: ' . $url, function ($message) use ($adminUser) {
                $message->to($adminUser->email)
                    ->subject('Thông báo bình luận mới cho bài viết');
            });
        }

        $totalComments = $baiViet->binhLuans()->where('trang_thai', BinhLuan::HIEN)->count();

        return response()->json([
            'success' => true,
            'binhLuan' => $binhLuan->load('user'),
            'totalComments' => $totalComments,
        ]);
    }
}
