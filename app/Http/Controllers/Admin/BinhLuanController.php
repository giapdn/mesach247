<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\ThongBao;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Quyền truy cập view index
        $this->middleware('permission:binh-luan-index')->only('index');

        // Quyền truy cập view detail
        $this->middleware('permission:binh-luan-detail')->only('show');

        // Quyền updateStatus
        $this->middleware('permission:binh-luan-updateStatus')->only('updateStatus');
    }

    public function index()
    {
        $binhLuans = BinhLuan::with('user', 'baiViet');
        $binhLuans = $binhLuans->get();

        return view('admin.binh-luan.index', compact('binhLuans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $binhLuan = BinhLuan::with('user', 'baiViet')->findOrFail($id);
        $danhGiaKhac = BinhLuan::where('user_id', $binhLuan->user_id)
            ->where('id', '!=', $id)
            ->with('user')
            ->get();
        $tongBinhLuan = BinhLuan::where('bai_viet_id', $binhLuan->baiViet->id)->count();
        return view('admin.binh-luan.detail', compact('binhLuan', 'danhGiaKhac', 'tongBinhLuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BinhLuan $binhLuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BinhLuan $binhLuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BinhLuan $binhLuan)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];

        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }
        $contact = BinhLuan::find($id);

        if ($contact) {
            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy thể loại'
        ], 404);
    }

    public function notificationBinhLuan($id = null)
    {
        if ($id) {
            $user = auth()->user();
            $thongBao = ThongBao::where('url', route('notificationBinhLuan', ['id' => $id]))
                ->where('user_id', $user->id)
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
            $binhLuans = BinhLuan::with('user', 'baiViet')->where('id', $id)->get();
        } else {
            $binhLuans = BinhLuan::with('user', 'baiViet')->get();
        }
        return view('admin.binh-luan.index', compact('binhLuans'));
    }
}
