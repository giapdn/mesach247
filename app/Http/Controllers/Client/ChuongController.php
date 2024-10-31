<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chuong;
use Illuminate\Http\Request;

class ChuongController extends Controller
{
    public function chiTietChuong($sachId, $chuongId,$name)
    {
        $chuong = Chuong::with('sach')->findOrFail($chuongId);
        $noiDung = $chuong->noi_dung;
        $countText = str_word_count($noiDung);
        $danhSachChuong = Chuong::where('sach_id', $chuong->sach->id)->get();
        // Lấy chương tiếp theo (cùng sách)
        $nextChuong = Chuong::where('sach_id', $chuong->sach->id)
            ->where('id', '>', $chuongId)
            ->first();
        // Lấy chương trước (cùng sách)
        $backChuong = Chuong::where('sach_id', $chuong->sach->id)
            ->where('id', '<', $chuongId)
            ->orderBy('id', 'desc')
            ->first();
        return view('client.pages.doc-sach', compact('chuong', 'countText', 'danhSachChuong', 'nextChuong', 'backChuong'));
    }
}
