<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        try {
            $query = $request->get('query');

            if (!$query) {
                return response()->json(['error' => 'Không có sách tương ứng'], 400);
            }

            // Tìm kiếm theo tên sách, tác giả hoặc thể loại
            $saches = Sach::where('kiem_duyet', 'duyet')
                ->where('trang_thai', 'hien')
                ->where('ten_sach', 'like', "%{$query}%")
                ->limit(10)
                ->get(['ten_sach']);

            $tacGia = User::with('vai_tros')->where('ten_doc_gia', 'like', "%{$query}%")
                ->whereHas('vai_tros', function ($q) {
                    $q->whereIn('vai_tro_id', [4, 1]);
                })
                ->limit(10)
                ->get(['ten_doc_gia', 'id']);

            $theLoais = TheLoai::where('trang_thai', 'hien')
                ->where('ten_the_loai', 'like', "%{$query}%")
                ->limit(10)
                ->get(['id', 'ten_the_loai']);

            return response()->json([
                'saches' => $saches,
                'users' => $tacGia,
                'theLoais' => $theLoais,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }

}
