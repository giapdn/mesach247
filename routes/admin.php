<?php

use App\Http\Controllers\Admin\BaiVietController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\ChuyenMucController;
use App\Http\Controllers\Admin\DanhGiaController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\EmailPhanHoiController;
use App\Http\Controllers\Admin\LienHeController;
use App\Http\Controllers\Admin\RutTienController;
use App\Http\Controllers\Admin\SachController;
use App\Http\Controllers\Admin\TheLoaiController;
use App\Http\Controllers\Admin\ThongKeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
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

/** ===========================================================================================================\
 * Khu vực routing của Client, các route viết cho client yêu cầu đặt hết bên trong docs này
 */

// Route::get('trang-chu', function () {
//     return view('client.index');
// })->name('trang-chu');

// Route::get('chi-tiet', function () {
//     return view('client.pages.chi-tiet-sach');
// })->name('chi-tiet');;
// Route::get('doc-sach', function () {
//     return view('client.pages.doc-sach');
// });
// Route::get('trang-ca-nhan', function () {
//     return view('client.pages.trang-ca-nhan');
// })->name('trang-ca-nhan');

// Route::get('the-loai', function () {
//     return view('client.pages.the-loai');
// })->name('the-loai');

// Route::get('tim-kiem', function () {
//     return view('client.pages.tim-kiem-nang-cao');
// })->name('tim-kiem');

// Route::get('hoi-dap', function () {
//     return view('client.pages.hoi-dap');
// })->name('hoi-dap');

/**
 * Kết thúc khu vực routing của Client.
 * ===========================================================================================================/
 */



/** ===========================================================================================================\
 * Bắt đầu routing cho ADMIN, các route viết cho admin yêu cầu đặt hết bên trong prefix này
 */

// Đăng nhập


// Route::get('/', [ThongKeController::class, 'index'])->name('/')->middleware('auth');
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('banner/{id}', [BannerController::class, 'show'])
    ->name('banner.detail');

Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\ThongKeController::class, 'index'])->name('admin');
    //banner
    Route::get('/get-banners-by-type/{type}', [BannerController::class, 'getBannersByType']);

    Route::post('/banner/{id}/update-status', [BannerController::class, 'updateStatus'])
        ->name('banner.update-status');

    // Kiểm duyệt cộng tác viên
    Route::get('kiem-duyet-cong-tac-vien', [\App\Http\Controllers\Admin\KiemDuyetCongTacVienController::class, 'index'])->name('kiem-duyet-cong-tac-vien');
    Route::post('/kiem-duyet-cong-tac-vien/{id}/update-status', [\App\Http\Controllers\Admin\KiemDuyetCongTacVienController::class, 'updateStatus']);
    Route::get('chi-tiet-kiem-duyet/{id}', [\App\Http\Controllers\Admin\KiemDuyetCongTacVienController::class, 'show'])->name('chi-tiet-kiem-duyet.show');
    Route::get('notificationCTV/{id}', [\App\Http\Controllers\Admin\KiemDuyetCongTacVienController::class, 'notificationCTV'])->name('notificationCTV');

    //Thông báo
    Route::post('/notifications/read/{id}', [\App\Http\Controllers\Admin\ThongBaoController::class, 'xemThongBao'])->name('notifications.read');
    Route::get('notificationSach/{id}', [SachController::class, 'notificationSach'])->name('notificationSach');
    Route::get('notificationRutTien/{id}', [\App\Http\Controllers\Admin\CongTacVienController::class, 'notificationRutTien'])->name('notificationRutTien');

    // Quản lý thông tin chi tiết tài khoản
    Route::get('users/{user}/showProfile', [UserController::class, 'showProfile'])->name('users.showProfile');
    Route::put('users/{user}/updateProfile', [UserController::class, 'updateProfile'])->name('users.updateProfile');
    // Thay đổi mật khẩu
    Route::put('users/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    // Trang trợ giúp
    Route::get('faqs', function () {
        return view('admin.faqs.index');
    })->name('faqs.index');
    // Quản lý vai trò
    Route::resource('roles', \App\Http\Controllers\Admin\VaiTroController::class);
    Route::post('/vai-tro/{id}/update-status', [\App\Http\Controllers\Admin\VaiTroController::class, 'updateStatus'])
        ->name('vai-tro.update-status');
    // Quản lý banner
    Route::resource('banner', BannerController::class);
    //Quản lý tài khoản (người dùng)

    //Quản lý người dùng (đổi trạng thái)
    Route::put('/users/changeStatus/{id}/{status}', [UserController::class, 'changeStatus'])->name('users.changeStatus');

    // Quản lý sách
    Route::resource('sach', SachController::class);
    // Xử lý trạng thái ẩn hiện của sách
    Route::post('/sach/an-hien/{id}', [SachController::class, 'anHien'])->name('sach.an-hien');
    // Xử lý trạng thái cập nhật của sách
    Route::post('/sach/cap-nhat/{id}', [SachController::class, 'capNhat'])->name('sach.capNhat');
    // Xử lý tình trạng cập nhật
    Route::post('/sach/tinh-trang-cap-nhat/{id}', [SachController::class, 'kiemDuyet'])->name('sach.kiemDuyet');
    // Thể Loai
    Route::resource('the-loai', TheLoaiController::class);
    // Xử lý trạng thái ẩn hiện của thể loại
    Route::post('/the-loai/cap-nhat-trang-thai/{id}', [TheLoaiController::class, 'capNhatTrangThai'])->name('the-loai.capNhatTrangThai');
    // Quản lý chương
    Route::get('chuong', [\App\Http\Controllers\Admin\ChuongController::class,'index'])->name('chuong.index');
    Route::post('/chuong/an-hien/{id}', [\App\Http\Controllers\Admin\ChuongController::class, 'anHien'])->name('chuong.an-hien');
    // Xử lý tình trạng cập nhật
    Route::post('/chuong/tinh-trang-cap-nhat/{id}', [\App\Http\Controllers\Admin\ChuongController::class, 'kiemDuyet'])->name('chuong.kiemDuyet');
    // route thêm chương vào sách
    Route::get('sach/{sach}/chuong/create', [\App\Http\Controllers\Admin\ChuongController::class, 'createChuong'])->name('chuong.create');
    Route::post('sach/{sach}/chuong', [\App\Http\Controllers\Admin\ChuongController::class, 'storeChuong'])->name('chuong.store');
    Route::get('sach/{sach}/chuong/{chuong}/edit', [\App\Http\Controllers\Admin\ChuongController::class, 'editChuong'])->name('chuong.edit');
    Route::put('sach/{sach}/chuong/{chuong}', [\App\Http\Controllers\Admin\ChuongController::class, 'updateChuong'])->name('chuong.update');
    Route::delete('sach/{sach}/chuong/{chuong}', [\App\Http\Controllers\Admin\ChuongController::class, 'destroyChuong'])->name('chuong.destroy');
    Route::get('sach/{sach}/chuong/{chuong}/show', [\App\Http\Controllers\Admin\ChuongController::class, 'showChuong'])->name('chuong.show');
    //Quản lý bài viết
    Route::resource('bai-viet', BaiVietController::class);
    // Xử lý trạng thái ẩn hiện của bài viết
    Route::post('/bai-viet/cap-nhat-trang-thai/{id}', [BaiVietController::class, 'capNhatTrangThai'])->name('bai-viet.capNhatTrangThai');

    // Quản lý thể chuyên mục bài viết
    Route::resource('chuyen-muc', ChuyenMucController::class);
    // Sử lý cập nhật trạng thái ẩn hiện chuyên mục bài viết
    Route::post('/chuyen-muc/cap-nhat-trang-thai/{id}', [ChuyenMucController::class, 'capNhatTrangThai'])->name('chuyen-muc.capNhatTrangThai');

    // Liên hệ
    Route::resource('lien-he', LienHeController::class);
    // Sử lý chuyển đổi trạng thái
    Route::post('/lien-he/{id}/update-status', [LienHeController::class, 'updateStatus']);
    // Sử lý gửi email
    Route::get('/lien-he/{id}/form', [LienHeController::class, 'phanHoiForm'])->name('lienhe.form');
    Route::post('/email/phanhoi', [EmailPhanHoiController::class, 'emailPhanHoi'])->name('email.phanHoi');

    // QUản lý đơn hàng
    Route::get('don-hang', [DonHangController::class, 'index'])->name('don-hang.index');
    Route::get('don-hang/{donHang}', [DonHangController::class, 'show'])->name('don-hang.detail');

    // Quản lý bình luận
    Route::get('binh-luan/index', [BinhLuanController::class, 'index'])
        ->name('binh-luan.index');
    Route::get('binh-luan/{id}', [BinhLuanController::class, 'show'])
        ->name('binh-luan.detail');
    Route::post('/binh-luan/{id}/update-status', [BinhLuanController::class, 'updateStatus'])
        ->name('binh-luan.update-status');

    // Quản lý đánh giá
    Route::get('danh-gia', [DanhGiaController::class, 'index'])->name('danh-gia.index');
    Route::get('danh-gia/{danhGia}', [DanhGiaController::class, 'show'])->name('danh-gia.detail');

    // Thống kê sách
    Route::get('thong-ke-sach', [\App\Http\Controllers\Admin\ThongKeSachController::class, 'soLuongSachDaBan'])->name('thong-ke-sach.index');
    Route::get('/lay-du-lieu-theo-ky', [\App\Http\Controllers\Admin\ThongKeSachController::class, 'layDuLieuTheoKy']);
    Route::get('/sach-ban', [\App\Http\Controllers\Admin\ThongKeSachController::class, 'getSachBan']);
    // Thống kê doanh thu (sách, danh mục, thời gian, tác giả, địa lý)
    Route::get('thong-ke-doanh-thu', [\App\Http\Controllers\Admin\ThongKeDoanhThuController::class, 'index'])->name('thong-ke-doanh-thu.index');
    Route::get('get-revenue-data', [\App\Http\Controllers\Admin\ThongKeDoanhThuController::class, 'getRevenueData']);
    Route::get('/get-revenue-by-category', [\App\Http\Controllers\Admin\ThongKeDoanhThuController::class, 'getRevenueByCategory']);
    Route::get('/get-doanh-thu', [\App\Http\Controllers\Admin\ThongKeDoanhThuController::class, 'getDoanhThu'])->name('doanh-thu.doanhThu');

    // Cộng tác viên

    Route::get('thong-ke-cong-tac-vien', [ThongKeController::class, 'congTacVien'])->name('cong-tac-vien.index');
    Route::get('top-dang-sach', [ThongKeController::class, 'topDangSach'])->name('top-dang-sach.index');

    Route::get('thong-ke-don-hang', [\App\Http\Controllers\Admin\ThongKeDonHangController::class, 'thongKeDonHang'])->name('thong-ke-don-hang.thongKeDonHang');
    Route::get('/thong-ke/sach-danh-gia-cao-nhat', [\App\Http\Controllers\Admin\ThongKeDanhGiaController::class, 'sachDanhGiaCaoNhat'])->name('admin.sachDanhGiaCaoNhat');
    Route::get('/admin/tim-sach', [\App\Http\Controllers\Admin\TimKiemController::class, 'timSach'])->name('admin.timSach');

    // Ckeditor
    Route::post('admin/ckeditor/upload', [\App\Http\Controllers\Admin\CkeditorController::class, 'upload'])->name('ckeditor.upload');

    //Cộng tác viên
    Route::get('cau-hoi-thuong-gap', function () {
        return view('admin.cong-tac-vien.hoi-dap');
    })->name('cau-hoi-thuong-gap.index');
    Route::get('chi-tiet-ctv/{id}', [\App\Http\Controllers\Admin\CongTacVienController::class, 'show'])->name('chi-tiet-ctv');

    Route::resource('yeu-cau-rut-tien', RutTienController::class);


    Route::get('noi-quy', function () {
        return view('admin.cong-tac-vien.noi-quy');
    })->name('noi-quy.index');
    Route::get(
        'thong-ke-chung-cong-tac-vien',
        [\App\Http\Controllers\Admin\CongTacVienController::class, 'thongKeChungCTV']
    )->name('thong-ke-chung-cong-tac-vien.index');

    // Route::get('rut-tien', function () {
    //     return view('admin.cong-tac-vien.rut-tien');
    // })->name('rut-tien.index');

    Route::get('rut-tien', [\App\Http\Controllers\Admin\CongTacVienController::class, 'rutTien'])->name('rut-tien.rutTien');
    Route::get('/withdraw/create', [\App\Http\Controllers\Admin\CongTacVienController::class, 'create'])->name('withdraw.create');
    Route::post('/withdraw/store', [\App\Http\Controllers\Admin\CongTacVienController::class, 'store'])->name('withdraw.store');
    // Chuyển đổi trạng thái của rút tiền
    Route::Post('/rut-tien/{id}/update-status', [RutTienController::class, 'updateStatus'])->name('rut-tien.update-status');
    // Kiểm tra tiền
    Route::get('/withdraw/checkSD', [\App\Http\Controllers\Admin\CongTacVienController::class, 'checkSD'])->name('withdraw.checkSD');
});
/**
 * Kết thúc routing cho ADMIN
 * ===========================================================================================================/
 */




/** ==========================================================================================================\
 * Phần bên dưới là phần code thừa, code chưa đặt tên nên không bỏ vào prefix admin dc, code chờ kiểm tra, v.v
 *
 */





/**
 * END.
 * ============================================================================================================/
 */
