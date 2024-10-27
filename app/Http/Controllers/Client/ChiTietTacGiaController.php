<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\User;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChiTietTacGiaController extends Controller
{
    public function show($id)
{
    $author = User::findOrFail($id);

    $filter = request()->input('filter', 'all');

    // Lọc danh sách sách dựa trên giá trị của filter
    $books = Sach::where('user_id', $id)
        ->where('trang_thai', Sach::HIEN) // Điều kiện trạng thái 'hiện'
        ->where('kiem_duyet', Sach::DUYET); // Điều kiện kiểm duyệt 'duyệt'

    // Áp dụng bộ lọc nếu có
    if ($filter == 'new') {
        $books->where('tinh_trang_cap_nhat', Sach::DA_FULL);
    } elseif ($filter == 'updating') {
        $books->where('tinh_trang_cap_nhat', Sach::TIEP_TUC_CAP_NHAT);
    } elseif ($filter == 'newest') {
        $books->orderBy('created_at', 'desc');
    } elseif ($filter == 'top-favorite') {
        // Lọc những sách có lượt yêu thích và sắp xếp giảm dần theo số lượng yêu thích
        $books->withCount('nguoiYeuThich')
            ->having('nguoi_yeu_thich_count', '>', 0) // Chỉ lấy sách có ít nhất 1 lượt yêu thích
            ->orderBy('nguoi_yeu_thich_count', 'desc');
    }

    // Lấy kết quả sau khi áp dụng các điều kiện
    $books = $books->get();

    // Đảm bảo các URL ảnh bìa sách đã được xử lý
    $books = $books->map(function ($book) {
        $book->anh_bia_sach_url = Storage::url($book->anh_bia_sach);
        return $book;
    });

    // Trả về JSON nếu là yêu cầu AJAX
    if (request()->ajax()) {
        return response()->json($books);
    }

    $yeuThichCount = YeuThich::whereHas('sach', function ($query) use ($id) {
        $query->where('user_id', $id);
    })->count();

    $soLuongSachCount = DonHang::where('trang_thai', 'thanh_cong')
        ->whereHas('sach', function ($query) use ($id) {
            $query->where('user_id', $id);
        })
        ->count();

    return view('client.pages.chi-tiet-tac-gia', compact('author', 'books', 'yeuThichCount', 'soLuongSachCount', 'filter'));
}

}
