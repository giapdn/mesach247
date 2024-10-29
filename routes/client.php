<?php

use App\Http\Controllers\Client\BaiVietController;
use App\Http\Controllers\Auth\Client\AuthController;
use App\Http\Controllers\Client\DanhGiaAjaxController;
use App\Http\Controllers\Client\SachController;
use App\Http\Controllers\Client\TrangCaNhanController;
use App\Http\Controllers\Client\TrangChuController;
use App\Http\Controllers\Payment\MomoPaymentController;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TrangChuController::class, 'index'])->name('home');
//Thanh toán
Route::post('/payment/momo', [MomoPaymentController::class, 'createPayment'])->name('payment.momo');
//Route::post('/payment/vnpay', [])

// Đăng nhập client -------------------------------------------------------
Route::middleware('guest')->group(function () {
    //Login
    Route::get('/cli/auth/login', [AuthController::class, 'showLoginForm'])
        ->name('cli.auth.showLoginForm');
    Route::post('/cli/auth/login', [AuthController::class, 'login'])
        ->name('cli.auth.login');

    //Signup
    Route::post('/cli/auth/register', [AuthController::class, 'register']);


});
//Forgot
Route::post('/cli/auth/forgot', [AuthController::class, 'forgot']);
Route::post('/cli/auth/logout', [AuthController::class, 'logout'])->name('cli.logout');
// End Đăng nhập client -------------------------------------------------------


Route::get('chi-tiet', function () {
    return view('client.pages.chi-tiet-sach');
})->name('chi-tiet');;
Route::get('doc-sach', function () {
    return view('client.pages.doc-sach');
});

// Trang cá nhân
Route::get('/trang-ca-nhan', [TrangCaNhanController::class, 'index'])
    ->name('trang-ca-nhan');
Route::put('/trang-ca-nhan/{id}', [TrangCaNhanController::class, 'update'])
    ->name('trang-ca-nhan.update');
    Route::put('/cai-dat-bao-mat/{id}', [TrangCaNhanController::class, 'doiMatKhau'])
    ->name('cai-dat-bao-mat');
Route::delete('/trang-ca-nhan/sach-yeu-thich/{id}', [TrangCaNhanController::class, 'destroy'])->name('xoa-yeu-thich');

// Bài viết - chuyên mục
Route::get('/chuyen-muc/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'filterByChuyenMuc'])
->name('chuyen-muc.filter');
Route::get('/filter/{id?}', [BaiVietController::class, 'filterByChuyenMuc'])
->name('filterByChuyenMuc');

Route::get('chi-tiet-bai-viet/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'show'])
->name('chi-tiet-bai-viet');
Route::post('bai-viet/{baiViet}/add-comment', [BaiVietController::class, 'addComment'])
->name('bai-viet.addComment');

// Chi tiết tác giả
Route::get('/tac-gia/{id}', [\App\Http\Controllers\Client\ChiTietTacGiaController::class, 'show'])
->name('chi-tiet-tac-gia');

// Thể loại
Route::get('the-loai/{id}', [\App\Http\Controllers\Client\TheLoaiController::class, 'index'])->name('the-loai');
Route::get('data-the-loai/{id}', [\App\Http\Controllers\Client\TheLoaiController::class, 'dataTheLoai'])->name('data-the-loai');


Route::post('/lien-he', [\App\Http\Controllers\Client\LienHeController::class, 'store'])->name('lien_he.store');

Route::get('tim-kiem', function () {
    return view('client.pages.tim-kiem-nang-cao');
})->name('tim-kiem');

Route::get('hoi-dap', function () {
    return view('client.pages.hoi-dap');
})->name('hoi-dap');

// Xếp hạng
Route::get('xep-hang-tac-gia', [\App\Http\Controllers\Client\XepHangController::class, 'sachBanChay'])->name('xep-hang-tac-gia');

//Route::get('chi-tiet-tac-gia', function () {
//    return view('client.pages.chi-tiet-tac-gia');
//})->name('chi-tiet-tac-gia');


Route::get('dang-nhap', function () {
    return view('client.auth.loginregister');
})->name('dang-nhap');

Route::get('thanh-toan/{id}', [PaymentController::class, 'index'])->name('thanh-toan');

// Thông báo
Route::get('thong-bao-chung/{id}', [\App\Http\Controllers\Client\ThongBaoController::class, 'index'])->name('thong-bao-chung');
Route::get('chi-tiet-thong-bao/{id}', [\App\Http\Controllers\Client\ThongBaoController::class, 'show'])->name('chi-tiet-thong-bao');

// Kiểm duyệt CTV
Route::post('kiemDuyetCTV', [\App\Http\Controllers\Client\KiemDuyetCongTacVienController::class, 'store'])->name('kiemDuyetCTV');

Route::post('/lien-he', [\App\Http\Controllers\Client\LienHeController::class, 'store'])->name('lien_he.store');

// Bài Viết
 Route::get('bai-viet/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('bai-viet');
 Route::get('chi-tiet-bai-viet', function () {
     return view('client.pages.chi-tiet-bai-viet');
 });
Route::post('/lien-he', [\App\Http\Controllers\Client\LienHeController::class, 'store'])->name('lien_he.store');
 // Danh sách sách
Route::get('danh-sach', [\App\Http\Controllers\Client\SachController::class, 'index'])->name('tim-kiem-sach');
Route::get('data-sach', [\App\Http\Controllers\Client\SachController::class, 'dataSach'])->name('data-sach');
// Chi tiết sách
Route::get('sach/{id}', [\App\Http\Controllers\Client\SachController::class, 'chiTietSach'])->name('chi-tiet-sach');
Route::post('danh-sach/danh-gia', [\App\Http\Controllers\Client\SachController::class, 'store'])->name('danh-sach.danh-gia');
Route::put('danh-sach/danh-gia/{id}', [\App\Http\Controllers\Client\SachController::class, 'update'])->name('cap-nhat-danh-gia');
//api Paginate chươngRoute::post('danh-sach/binh-luan', [\App\Http\Controllers\Client\SachController::class, 'store'])->name('danh-sach.danh-gia');
Route::get('data-chuong/{id}', [\App\Http\Controllers\Client\SachController::class,'dataChuong'])->name('data-chuong');
// Chi tiết chương
Route::get('chi-tiet-chuong/{id}/{name}', [\App\Http\Controllers\Client\ChuongController::class, 'chiTietChuong'])->name('chi-tiet-chuong');
Route::get('data-chuong/{id}', [\App\Http\Controllers\Client\SachController::class, 'dataChuong'])->name('data-chuong');
// Bài Viết
// Route::get('bai-viet/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('bai-viet');
// Route::get('chi-tiet-bai-viet', function () {
//     return view('client.pages.chi-tiet-bai-viet');
// });
Route::get('bai-viet/{id}', action: [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('bai-viet');
Route::get('chi-tiet-bai-viet', function () {
    return view('client.pages.chi-tiet-bai-viet');
});

Route::get('dang-ky-cong-tac-vien', function () {
    return view('client.pages.dang-ky-cong-tac-vien');
})->name('dang-ky-cong-tac-vien')->middleware('auth');


Route::get('phuc-loi-tac-gia', function () {
    return view('client.pages.phuc-loi-tac-gia');
})->name('phuc-loi-tac-gia');


Route::get('hop-dong', function () {
    return view('client.pages.hop-dong');
})->name('hop-dong');

Route::get('yeu-thich', function () {
    return view('client.pages.yeu-thich');
})->name('yeu-thich');


Route::post('danh-sach/binh-luan', [\App\Http\Controllers\Client\SachController::class, 'store'])->name('danh-sach.binh-luan');
Route::get('/ajax/danh-gia', [SachController::class, 'getDanhGia'])->name('getDanhGia');
Route::get('/search', [\App\Http\Controllers\Client\SearchController::class, 'search'])->name('search');

