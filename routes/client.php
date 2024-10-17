<?php

use App\Http\Controllers\Client\BaiVietController;
use App\Http\Controllers\Client\TrangCaNhanController;
use App\Http\Controllers\Client\TrangChuController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TrangChuController::class, 'index'])->name('home');

Route::get('trang-chu', function () {
    return view('client.index');
})->name('trang-chu');

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

// Bài viết
// Route::get('/bai-viet', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])
// ->name('bai-viet');
Route::get('/chuyen-muc/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'filterByChuyenMuc'])
->name('chuyen-muc.filter');
Route::get('/filter/{id?}', [BaiVietController::class, 'filterByChuyenMuc'])->name('filterByChuyenMuc');

Route::get('chi-tiet-bai-viet/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'show'])
->name('chi-tiet-bai-viet');
Route::post('bai-viet/{baiViet}/add-comment', [BaiVietController::class, 'addComment'])
->name('bai-viet.addComment');



// Thể loại
Route::get('the-loai/{id}', [\App\Http\Controllers\Client\TheLoaiController::class, 'index'])->name('the-loai');


Route::post('/lien-he', [\App\Http\Controllers\Client\LienHeController::class, 'store'])->name('lien_he.store');

Route::get('tim-kiem', function () {
    return view('client.pages.tim-kiem-nang-cao');
})->name('tim-kiem');

Route::get('hoi-dap', function () {
    return view('client.pages.hoi-dap');
})->name('hoi-dap');


Route::get('xep-hang-tac-gia', function () {
    return view('client.pages.xep-hang-tac-gia');
})->name('xep-hang-tac-gia');

Route::get('chi-tiet-tac-gia', function () {
    return view('client.pages.chi-tiet-tac-gia');
})->name('chi-tiet-tac-gia');



Route::get('dang-nhap', function () {
    return view('client.auth.loginregister');
})->name('dang-nhap');

Route::get('thanh-toan', function () {
    return view('client.pages.thanh-toan');
})->name('thanh-toan');

Route::get('thong-bao-chung', function () {
    return view('client.pages.thong-bao-chung');
})->name('thong-bao-chung');

Route::get('chi-tiet-thong-bao', function () {
    return view('client.pages.chi-tiet-thong-bao');
})->name('chi-tiet-thong-bao');

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
//api Paginate chương
Route::get('data-chuong/{id}', [\App\Http\Controllers\Client\SachController::class,'dataChuong'])->name('data-chuong');

// Route::get('bai-viet/{id}', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('bai-viet');
// Route::get('chi-tiet-bai-viet', function () {
//     return view('client.pages.chi-tiet-bai-viet');
// });
 Route::get('bai-viet/{id}', action: [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('bai-viet');
 Route::get('chi-tiet-bai-viet', function () {
     return view('client.pages.chi-tiet-bai-viet');
 });

 //Danh sách sách
Route::get('danh-sach', [\App\Http\Controllers\Client\SachController::class, 'index'])->name('tim-kiem-sach');
Route::get('data-sach', [\App\Http\Controllers\Client\SachController::class, 'dataSach'])->name('data-sach');


