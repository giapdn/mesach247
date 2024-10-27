<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ThongBao;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    public function index($id)
    {
        $userId = auth()->id();
        $soluong = 10;
        $thong_baos = ThongBao::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate($soluong);

        return view('client.pages.thong-bao-chung', compact('thong_baos'));
    }

    public function show($id)
    {
        $userId = auth()->id();
        $thong_bao = ThongBao::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $thong_bao->update(['trang_thai' => 'da_xem']);
        return view('client.pages.chi-tiet-thong-bao', compact('thong_bao'));
    }


}
