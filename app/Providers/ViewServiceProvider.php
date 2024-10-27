<?php

namespace App\Providers;

use App\Models\ThongBao;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                // Thông báo sách
                $thongBaosSach = ThongBao::where('trang_thai', 'chua_xem')
                    ->where('user_id', '=', $user->id)
                    ->where('type', 'sach')
                    ->orderBy('created_at', 'desc')
                    ->get();
                // Thông báo tiền
                $thongBaosTien = ThongBao::where('trang_thai', 'chua_xem')
                    ->where('user_id', '=', $user->id)
                    ->where('type', 'tien')
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Thông báo đăng ký CTV
                $thongBaoCTV = ThongBao::where('trang_thai', 'chua_xem')
                    ->where('user_id', '=', $user->id)
                    ->where('type', 'kiemDuyetCTV')
                    ->orderBy('created_at', 'desc')
                    ->get();
                $tong = $thongBaosSach->count() + $thongBaosTien->count() + $thongBaoCTV->count();

                $view->with([
                    'notificationsSach' => $thongBaosSach,
                    'notificationsTien' => $thongBaosTien,
                    'notificationCTV' => $thongBaoCTV,
                    'tong' => $tong,
                ]);
            }
        });
    }

    public function register()
    {
        //
    }
}
