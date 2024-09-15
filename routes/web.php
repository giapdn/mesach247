<?php

use App\Http\Controllers\ChuyenMucController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

// Quản lý sách
Route::get('sach/index', function () {
    return view('admin.sach.index');
})->name('sach.index');

Route::get('sach/add', function () {
    return view('admin.sach.add');
})->name('sach.add');

Route::get('sach/detail', function () {
    return view('admin.sach.detail');
})->name('sach.detail');

Route::get('sach/edit', function () {
    return view('admin.sach.edit');
})->name('sach.edit');
// Quản lý chuyên mục
Route::prefix('chuyen-muc')->group(function () {
    // Danh sách chuyên mục
    Route::get('/index', [ChuyenMucController::class, 'index'])->name('chuyenmuc.index');
    
    // Hiển thị chi tiết chuyên mục
    Route::get('/{id}/detail', [ChuyenMucController::class, 'show'])->name('chuyenmuc.show');
    
    // Hiển thị form chỉnh sửa chuyên mục
    Route::get('/{id}/edit', [ChuyenMucController::class, 'edit'])->name('chuyenmuc.edit');
    
    // Cập nhật chuyên mục
    Route::put('/{id}', [ChuyenMucController::class, 'update'])->name('chuyenmuc.update');
    
    // Xóa chuyên mục
    Route::delete('/{id}', [ChuyenMucController::class, 'destroy'])->name('chuyenmuc.destroy');
    
    // Hiển thị form tạo mới chuyên mục
    Route::get('/create', [ChuyenMucController::class, 'create'])->name('chuyenmuc.create');
    
    // Lưu trữ chuyên mục mới
    Route::post('/store', [ChuyenMucController::class, 'store'])->name('chuyenmuc.store');
});

// Quản lý thể loại
Route::get('the-loai/index', function () {
    return view('admin.the-loai.index');
})->name('the-loai.index');

Route::get('the-loai/detail', function () {
    return view('admin.the-loai.detail');
})->name('the-loai.detail');

Route::get('the-loai/edit', function () {
    return view('admin.the-loai.edit');
})->name('the-loai.edit');

// Quản lý bài viết
Route::get('bai-viet/index', function () {
    return view('admin.bai-viet.index');
})->name('bai-viet.index');

Route::get('bai-viet/add', function () {
    return view('admin.bai-viet.add');
})->name('bai-viet.add');

Route::get('bai-viet/detail', function () {
    return view('admin.bai-viet.detail');
})->name('bai-viet.detail');

Route::get('bai-viet/edit', function () {
    return view('admin.bai-viet.edit');
})->name('bai-viet.edit');

// Quản lý thể loại bài viết
Route::get('danh-muc-bai-viet/index', function () {
    return view('admin.danh-muc-bai-viet.index');
})->name('danh-muc-bai-viet.index');

Route::get('danh-muc-bai-viet/detail', function () {
    return view('admin.danh-muc-bai-viet.detail');
})->name('danh-muc-bai-viet.detail');

Route::get('danh-muc-bai-viet/edit', function () {
    return view('admin.danh-muc-bai-viet.edit');
})->name('danh-muc-bai-viet.edit');

// Quản lý banner
Route::get('banner/index', function () {
    return view('admin.banner.index');
})->name('banner.index');

Route::get('banner/detail', function () {
    return view('admin.banner.detail');
})->name('banner.detail');

Route::get('banner/edit', function () {
    return view('admin.banner.edit');
})->name('banner.edit');

// Quản lý khuyến mại
Route::get('khuyen-mai/index', function () {
    return view('admin.khuyen-mai.index');
})->name('khuyen-mai.index');

Route::get('khuyen-mai/detail', function () {
    return view('admin.khuyen-mai.detail');
})->name('khuyen-mai.detail');

Route::get('khuyen-mai/edit', function () {
    return view('admin.khuyen-mai.edit');
})->name('khuyen-mai.edit');

// Quản lý bình luận
Route::get('binh-luan/index', function () {
    return view('admin.binh-luan.index');
})->name('binh-luan.index');

Route::get('binh-luan/detail', function () {
    return view('admin.binh-luan.detail');
})->name('binh-luan.detail');

// Quản lý đánh giá
Route::get('danh-gia/index', function () {
    return view('admin.danh-gia.index');
})->name('danh-gia.index');

Route::get('danh-gia/detail', function () {
    return view('admin.danh-gia.detail');
})->name('danh-gia.detail');


// QUản lý đơn hàng

Route::get('don-hang/index', function () {
    return view('admin.don-hang.index');
})->name('don-hang.index');
Route::get('don-hang/detail', function () {
    return view('admin.don-hang.detail');
});

// Liên hệ

Route::get('lien-he/index', function () {
    return view('admin.lien-he.index');
})->name('lien-he.index');

// Thống kê

Route::get('thong-ke/index', function () {
    return view('admin.thong-ke.index');
})->name('thong-ke.index');

// Mẫu email

Route::get('email/index', function () {
    return view('admin.mau-gui-email.index');
})->name('email.index');

// Quản lý tài khoaản

Route::get('tai-khoan/index', function () {
    return view('admin.tai-khoan.index');
})->name('tai-khoan.index');

// Xác thực

Route::get('xac-thuc/dang-nhap', function () {
    return view('admin.xac-thuc.dang-nhap');
})->name('xac-thuc.dang-nhap');

Route::get('xac-thuc/dang-ky', function () {
    return view('admin.xac-thuc.dang-ky');
})->name('xac-thuc.dang-ky');

Route::get('xac-thuc/quen-mat-khau', function () {
    return view('admin.xac-thuc.quen-mat-khau');
})->name('xac-thuc.quen-mat-khau');
