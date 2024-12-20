<?php

namespace App\Http\Controllers\Client;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\SendRawEmailJob;
use App\Models\KiemDuyetCongTacVien;
use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class KiemDuyetCongTacVienController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:kiem_duyet_cong_tac_viens,email',
            'so_dien_thoai' => 'required|numeric',
            'dia_chi' => 'required|string|max:255',
            'sinh_nhat' => 'required|date',
            'gioi_tinh' => 'required|string|in:Nam,Nữ',
            'cv_pdf' => 'required|mimes:pdf|max:2048',
            'ok' => 'accepted'
        ]);

        $cv_pdf = $request->file('cv_pdf')->store('uploads/cv', 'public');

        $congTacVien = new KiemDuyetCongTacVien();
        $congTacVien->ten_doc_gia = $request->ten_doc_gia;
        $congTacVien->email = $request->email;
        $congTacVien->so_dien_thoai = $request->so_dien_thoai;
        $congTacVien->dia_chi = $request->dia_chi;
        $congTacVien->sinh_nhat = $request->sinh_nhat;
        $congTacVien->gioi_tinh = $request->gioi_tinh;
        $congTacVien->ghi_chu = $request->ghi_chu;
        $congTacVien->cv_pdf = $cv_pdf;
        $congTacVien->user_id = Auth::id();
        $congTacVien->save();

        $adminUsers = User::whereHas('vai_tros', function($query) {
            $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
        })->get();

        foreach ($adminUsers as $adminUser) {
            $url = route('notificationCTV', ['id' => $congTacVien->id]);
            $notification = ThongBao::create([
                'user_id' => $adminUser->id,
                'tieu_de' => 'Có một đơn đăng ký mới cần kiểm duyệt',
                'noi_dung' => 'Đơn đăng ký của "' . $congTacVien->ten_doc_gia . '" đã được gửi và đang chờ xác nhận.',
                'url' => $url,
                'trang_thai' => 'chua_xem',
                'type' => 'chung',
            ]);

            broadcast(new NotificationSent($notification));
//            Mail::raw('Có một đơn đăng ký cộng tác viên mới từ "' . $congTacVien->ten_doc_gia . '". Vui lòng kiểm duyệt. Bạn có thể xem chi tiết tại: ' . $url, function ($message) use ($adminUser) {
//                $message->to($adminUser->email)
//                    ->subject('Đơn đăng ký cộng tác viên mới');
//            });
            SendRawEmailJob::dispatch(
                $adminUser->email,
                'Đơn đăng ký cộng tác viên mới',
                'Có một đơn đăng ký cộng tác viên mới từ "' . $congTacVien->ten_doc_gia . '". Vui lòng kiểm duyệt. Bạn có thể xem chi tiết tại: ' . $url
            );
        }

        return redirect()->route('home')->with('success', 'Đăng ký thành công.');
    }
}
