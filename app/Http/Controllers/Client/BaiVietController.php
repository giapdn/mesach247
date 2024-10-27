<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

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

        $baiViets = BaiViet::where('trang_thai', BaiViet::HIEN)
            ->when($id, function ($query) use ($id) {
                $query->where('chuyen_muc_id', $id);
            });

        if ($filter === 'new-chap') {
            $baiViets->orderBy('ngay_dang', 'desc');
        }

        // Thực hiện truy vấn
        $baiViets = $baiViets->get();

        // Lấy top 10 bài viết được bình luận nhiều nhất
        $topBaiViets = BaiViet::withCount(['binhLuans' => function ($query) {
            $query->where('trang_thai', BinhLuan::HIEN);
        }])
            ->where('trang_thai', BaiViet::HIEN)
            ->whereHas('chuyenMuc', function ($query) {
                $query->where('trang_thai', 'hien');
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
        ]);

        return response()->json([
            'success' => true,
            'binhLuan' => $binhLuan->load('user'),
        ]);
    }
}
