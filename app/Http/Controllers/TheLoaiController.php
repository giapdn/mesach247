<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuaTheLoaiRequest;
use App\Http\Requests\ThemTheLoaiRequest;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theLoais = TheLoai::query()->get();
        return view('admin.the-loai.index', compact('theLoais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.the-loai.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThemTheLoaiRequest $request)
    {

        if ($request->isMethod('post')) {
            $param = $request->all();
            if ($request->hasFile('anh_the_loai')) {
            $filePath = $request->file('anh_the_loai')->store('uploads/the-loai', 'public');
            } else {
                $filePath = null;
            }
            $param['anh_the_loai'] = $filePath;
            TheLoai::query()->create($param);
            return redirect()->route('the-loai.index')->with('success', 'Thêm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $theLoai = TheLoai::query()->find($id);
        $saches = Sach::with('theLoai', 'tacGia')
            ->where('the_loai_id', $id)  // Lọc sách theo the_loai_id
            ->get();
        return view('admin.the-loai.detail', compact('theLoai', 'saches'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $theLoai = TheLoai::query()->find($id);
        return view('admin.the-loai.edit', compact('theLoai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuaTheLoaiRequest $request, string $id)
    {
        if ($request->isMethod('put')) {
            $param = $request->except('_token', '_method');
            $theLoai = TheLoai::query()->findOrFail($id);
            if ($request->hasFile('anh_the_loai')) {
                if ($theLoai->anh_the_loai && Storage::disk('public')->exists($theLoai->anh_the_loai)) {
                    Storage::disk('public')->delete($theLoai->anh_the_loai);
                }
                $filePath = $request->file('anh_the_loai')->store('uploads/the-loai', 'public');
            } else {
                $filePath = $theLoai->anh_the_loai;
            }
            $param['anh_the_loai'] = $filePath;
            $theLoai->update($param);
            return redirect()->route('the-loai.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theLoai = TheLoai::query()->findOrFail($id);
        if ($theLoai->anh_the_loai && Storage::disk('public')->exists($theLoai->anh_the_loai)) {
            Storage::disk('public')->delete($theLoai->anh_the_loai);
        }
        $theLoai->delete();
        return redirect()->route('the-loai.index');
    }
}
