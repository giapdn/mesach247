<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    // public function index()
    // {
    //     // Lấy các chuyên mục cha và chuyên mục con nhiều cấp
    //     $chuyenMucs = ChuyenMuc::with('chuyenMucCons.chuyenMucCons')
    //         ->whereNull('chuyen_muc_cha_id')
    //         ->get();

    //     // Lấy tất cả bài viết
    //     $baiViets = BaiViet::all();

    //     // Lấy top 10 bài viết được bình luận nhiều nhất
    //     $topBaiViets = BaiViet::withCount('binhLuans')
    //         ->orderBy('binh_luans_count', 'desc')
    //         ->take(10)
    //         ->get();

    //     return view('client.pages.bai-viet', compact(
    //         'chuyenMucs',
    //         'baiViets',
    //         'topBaiViets'
    //     ));
    // }

    public function filterByChuyenMuc(Request $request, $id = null)
    {
        // Lấy các chuyên mục cha và chuyên mục con nhiều cấp
        $chuyenMucs = ChuyenMuc::with('chuyenMucCons.chuyenMucCons')
            ->whereNull('chuyen_muc_cha_id')
            ->get();
    
        // Lấy chuyên mục hiện tại nếu có ID
        $currentChuyenMuc = null;
        if ($id) {
            $currentChuyenMuc = ChuyenMuc::findOrFail($id);
        }
    
        // Lấy bài viết theo yêu cầu lọc
        $filter = $request->get('filter'); 
    
        if ($filter === 'new-chap') {
            // Lọc theo bài viết mới cập nhật (ngày đăng mới nhất)
            $baiViets = BaiViet::when($id, function ($query) use ($id) {
                $query->where('chuyen_muc_id', $id);
            })
            ->orderBy('ngay_dang', 'desc')
            ->get();
        } else {
            // Mặc định là "Tất cả" (lấy toàn bộ bài viết hoặc theo chuyên mục nếu có)
            $baiViets = BaiViet::when($id, function ($query) use ($id) {
                $query->where('chuyen_muc_id', $id);
            })
            ->get();
        }
    
        // Lấy top 10 bài viết được bình luận nhiều nhất
        $topBaiViets = BaiViet::withCount('binhLuans')
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
        // Lấy bài viết kèm theo thông tin chuyên mục, tác giả và bình luận
        $baiViet = BaiViet::with(['chuyenMuc', 'tacGia', 'binhLuans.user'])
            ->findOrFail($id);

        return view('client.pages.chi-tiet-bai-viet', compact('baiViet'));
    }
    public function addComment(Request $request, $baiVietId)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        // Validate bình luận
        $request->validate([
            'noi_dung' => 'required|string|max:500',
        ]);

        // Lưu bình luận
        $baiViet = BaiViet::findOrFail($baiVietId);
        $baiViet->binhLuans()->create([
            'noi_dung' => $request->noi_dung,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Bình luận của bạn đã được đăng.');
    }
}
