<?php

namespace App\Http\Controllers;

use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class ChuyenMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $chuyenMucs = ChuyenMuc::query()
            ->when($search, function($query, $search) {
                return $query->where('ten_chuyen_muc', 'like', "%{$search}%");
            })
            ->get(); 
    
        return view('admin.chuyenmuc.index', compact('chuyenMucs', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trả về view tạo mới chuyên mục
        return view('admin.chuyenmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'ten_chuyen_muc' => 'required|max:255',
            'chuyen_muc_cha_id' => 'nullable|integer',
        ]);

        // Tạo mới chuyên mục
        ChuyenMuc::create($request->all());

        // Redirect về trang danh sách chuyên mục với thông báo thành công
        return redirect("chuyen-muc/index");
    }

    /**
     * Display the specified resource.
     */
    public function show(ChuyenMuc $chuyenMuc,string $id)
    {
        $chuyenMuc = ChuyenMuc::findOrFail($id);
        // Hiển thị chi tiết của chuyên mục
        return view('admin.chuyenmuc.show', compact('chuyenMuc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chuyenMuc = ChuyenMuc::findOrFail($id);
        // Trả về view chỉnh sửa chuyên mục
        return view('admin.chuyenmuc.edit', compact('chuyenMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chuyenMuc = ChuyenMuc::findOrFail($id);
        // Validate dữ liệu đầu vào
        $request->validate([
            'ten_chuyen_muc' => 'required|max:255',
            'chuyen_muc_cha_id' => 'nullable|integer',
        ]);

        // Cập nhật chuyên mục
        $chuyenMuc->update($request->all());

        // Redirect về trang danh sách chuyên mục với thông báo thành công
        return redirect("chuyen-muc/index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChuyenMuc $chuyenMuc, string $id)
    {
        $chuyenMuc = ChuyenMuc::findOrFail($id);
        // Xóa chuyên mục
        $chuyenMuc->delete();

        // Redirect về trang danh sách chuyên mục với thông báo thành công
        return redirect("chuyen-muc/index");
    }
}
