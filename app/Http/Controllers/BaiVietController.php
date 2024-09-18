<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả các bài viết
        $baiViets = BaiViet::all();
        $baiViets = $baiViets->map(function ($baiViet) {
            $baiViet->ngay_dang = $baiViet->ngay_dang ? \Carbon\Carbon::parse($baiViet->ngay_dang) : null;
            return $baiViet;
        });
        return view('admin.bai-viet.index', compact('baiViets'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(BaiViet $baiViet)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BaiViet $baiViet)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BaiViet $baiViet)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaiViet $baiViet, string $id)
    {
        $baiViet = BaiViet::findOrFail($id);
        // Xóa ảnh nếu có
        if ($baiViet->hinh_anh) {
            Storage::delete($baiViet->hinh_anh);
        }

        $baiViet->delete();

        return redirect()->route('bai-viet.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}
