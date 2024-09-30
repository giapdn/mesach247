<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ThongKeDoanhThuController extends Controller
{
    public function index(Request $request)
    {
        // Tính doanh thu theo ngày (lấy từ các dơn hàng có trạng thái thanh_cong)
        // now lọc các đơn hàng hôm nay
        // now()->subDay() lọc các đơn hàng hôm qua
        $doanhThuHomNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereDate('created_at', now())
            ->sum('so_tien_thanh_toan');
        $doanhThuHomQua = DonHang::where('trang_thai', 'thanh_cong')
            ->whereDate('created_at', now()->subDay())
            ->sum('so_tien_thanh_toan');
        // Lấy so_tien_thanh_toan của hôm nay dựa trên đơn hàng có trang_thai=thanh_cong
        $chiTietDoanhThuHomNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereDate('created_at', now())
            ->pluck('so_tien_thanh_toan')->toArray();
        // Tính phần trăm cho doanh thu
        // Tính % dựa trên công thức ở if đầu tiên
        // Nếu doanh thu hôm qua không có thì sẽ thực hiện công thức elseif, phần trăm sẽ là 100%
        $phanTram = 0;
        if ($doanhThuHomQua > 0) {
            $phanTram = (($doanhThuHomNay - $doanhThuHomQua) / $doanhThuHomQua) * 100;
        } elseif ($doanhThuHomQua == 0) {
            $phanTram = $doanhThuHomNay > 0 ? 100 : 0;
        }
        // Hiển thị % nếu thông số quá lớn
        // $phanTram = min($phanTram, 100);

        // Tính doanh thu theo tháng (lấy từ các dơn hàng có trạng thái thanh_cong)
        // whereMonth + now()->month để lọc theo tháng hiện tại & whereMonth +  now()->subMonth()->month để lọc theo tháng trước
        // Ở đây phải lọc kèm theo cả năm vì tránh gây nhầm lẫn giữa các tháng của năm nay và năm trước ...
        // whereYear + now()->year lọc theo năm hiện tại không theo các năm trước đó
        $doanhThuThangNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('so_tien_thanh_toan');

        $doanhThuThangTruoc = 0;
        if (now()->month > 1) {
            $doanhThuThangTruoc = DonHang::where('trang_thai', 'thanh_cong')
                ->whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->year)
                ->sum('so_tien_thanh_toan');
        }
        $phanTramThang = 0;
        if ($doanhThuThangTruoc > 0) {
            $phanTramThang = (($doanhThuThangNay - $doanhThuThangTruoc) / $doanhThuThangTruoc) * 100;
        } elseif ($doanhThuThangTruoc == 0) {
            $phanTramThang = $doanhThuThangNay > 0 ? 100 : 0;
        }
        // Hiển thị % nếu thông số quá lớn
//        $phanTramThang = min($phanTramThang, 100);
        // Lấy doanh thu cho từng đơn hàng trong tháng này
        $chiTietDoanhThuThang = DonHang::where('trang_thai', 'thanh_cong')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->pluck('so_tien_thanh_toan');

        // Tính doanh thu theo năm (lấy từ các dơn hàng có trạng thái thanh_cong)
        $doanhThuNamNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->year)
            ->sum('so_tien_thanh_toan');

        $doanhThuNamTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->subYear()->year)
            ->sum('so_tien_thanh_toan');

        $chiTietNamNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->year)
            ->pluck('so_tien_thanh_toan')->toArray();

        $phanTramNam = 0;
        if ($doanhThuNamTruoc > 0) {
            $phanTramNam = (($doanhThuNamNay - $doanhThuNamTruoc) / $doanhThuNamTruoc) * 100;
        } elseif ($doanhThuNamTruoc == 0) {
            $phanTramNam = $doanhThuNamNay > 0 ? 100 : 0;
        }



        // Doanh thu quý hiện tại (lấy từ các đơn hàng có trạng thái thanh_cong)
        $quy = ceil(now()->month / 3); // Tính quý hiện tại
        $nam = now()->year;

        // Tính doanh thu quý hiện tại
        $doanhThuQuyHienTai = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', $nam)
            ->whereRaw('QUARTER(created_at) = ?', [$quy])
            ->sum('so_tien_thanh_toan');

        // Tính doanh thu quý trước
        $quyTruoc = $quy - 1;
        $doanhThuQuyTruoc = 0;

        if ($quyTruoc > 0) {
            // Tính doanh thu quý trước của cùng năm
            $doanhThuQuyTruoc = DonHang::where('trang_thai', 'thanh_cong')
                ->whereYear('created_at', $nam)
                ->whereRaw('QUARTER(created_at) = ?', [$quyTruoc])
                ->sum('so_tien_thanh_toan');
        } elseif ($quy === 1) {
            // Nếu quý hiện tại là quý 1, thì tính doanh thu quý 4 của năm trước
            $previousYear = $nam - 1;
            $doanhThuQuyTruoc = DonHang::where('trang_thai', 'thanh_cong')
                ->whereYear('created_at', $previousYear)
                ->whereRaw('QUARTER(created_at) = 4')
                ->sum('so_tien_thanh_toan');
        }

        // Tính phần trăm thay đổi doanh thu giữa các quý
        $phanTramQuy = 0;
        if ($doanhThuQuyTruoc > 0) {
            $phanTramQuy = (($doanhThuQuyHienTai - $doanhThuQuyTruoc) / $doanhThuQuyTruoc) * 100;
        } elseif ($doanhThuQuyTruoc == 0) {
            $phanTramQuy = $doanhThuQuyHienTai > 0 ? 100 : 0;
        }


// Lấy chi tiết doanh thu trong quý hiện tại
        $chiTietDoanhThuQuy = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->year)
            ->whereRaw('QUARTER(created_at) = ?', [$quy])
            ->pluck('so_tien_thanh_toan')
            ->toArray();

        // Tính doanh thu theo thể loại sách
        $doanhThuTheoTheLoai = DB::table('don_hangs')
            // join tới bảng sách để lấy thông tin sách
            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
            // join tới bảng thể loại
            ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
            // tính doanh thu dựa trên tất cả các đơn hàng có trạng thái thành công
            ->where('don_hangs.trang_thai', 'thanh_cong')
            // vì đây là tính doanh thu trong 1 ngày nên dùng now
            ->whereDate('don_hangs.created_at', now())
            // chọn các trường dữ liệu
            ->select('the_loais.ten_the_loai',
                DB::raw('DATE(don_hangs.created_at) as ngay'),
                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu'))
            ->groupBy('the_loais.ten_the_loai', DB::raw('DATE(don_hangs.created_at)'))
            ->orderBy('ngay', 'asc')
            ->get();
        // lấy tên thể loại
        $theLoai = $doanhThuTheoTheLoai->pluck('ten_the_loai')->unique();
        $doanhThu = [];
        foreach ($theLoai as $loai) {
            $doanhThu[$loai] = $doanhThuTheoTheLoai->where('ten_the_loai', $loai)->pluck('tong_doanh_thu', 'ngay')->toArray();
        }

        // Tính doanh thu theo sách
        $doanhThuTheoSachTheoNgay = DB::table('don_hangs')
            ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
            ->select(
                DB::raw('DATE(don_hangs.created_at) as ngay'),
                'saches.ten_sach',
                DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
            )
            ->where('don_hangs.trang_thai', 'thanh_cong')
            ->whereDate('don_hangs.created_at', now()->toDateString())
            ->groupBy('ngay', 'saches.ten_sach')
            ->orderBy('tong_doanh_thu', 'desc')
            ->get();

        return view('admin.thong-ke.thong-ke-doanh-thu', compact(
            'doanhThuHomNay',
            'doanhThuHomQua',
            'phanTram',
            'chiTietDoanhThuHomNay',
            'doanhThuThangNay',
            'doanhThuThangTruoc',
            'phanTramThang',
            'chiTietDoanhThuThang',
            'doanhThuNamNay',
            'doanhThuNamTruoc',
            'chiTietNamNay',
            'phanTramNam',
            'quy',
            'doanhThuQuyHienTai',
            'doanhThuQuyTruoc',
            'phanTramQuy',
            'chiTietDoanhThuQuy',
            'doanhThuTheoTheLoai',
            'theLoai',
            'doanhThu',
            'doanhThuTheoSachTheoNgay'
        ));
    }
}