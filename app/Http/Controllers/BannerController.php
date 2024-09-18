<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function index()
    {
        // lấy tất cả các bản ghi của Banner từ cơ sở dữ liệu và trả về view
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        // Trả về view tạo banner
    }

    public function store(Request $request)
    {
        $request->validate([
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'noi_dung' => 'required|string|max:1000',
            'trang_thai' => 'required|in:hien,an',
        ]);

        $imagePath = null;

        if ($request->hasFile('hinh_anh')) {
            $imagePath = $request->file('hinh_anh')->store('banners', 'public');
        }

        Banner::create([
            'hinh_anh' => $imagePath,
            'noi_dung' => $request->noi_dung,
            'loai_banner' => $request->loai_banner,
            'trang_thai' => $request->trang_thai,
        ]);

        return redirect()->route('banner.index')->with('success', 'Thêm mới Banner thành công.');
    }

    public function show($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            abort(404, 'Not found');
        }
        return view('admin.banner.detail', compact('banner'));
    }


    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'hinh_anh' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'noi_dung' => 'required|string|max:1000',
            'trang_thai' => 'required|in:an,hien',
        ]);

        if ($request->hasFile('hinh_anh')) {
            if ($banner->hinh_anh && Storage::disk('public')->exists($banner->hinh_anh)) {
                Storage::disk('public')->delete($banner->hinh_anh);
            }

            $imagePath = $request->file('hinh_anh')->store('banners', 'public');
            $banner->hinh_anh = $imagePath;
        }

        $banner->noi_dung = $request->noi_dung;
        $banner->loai_banner = $request->loai_banner;
        $banner->trang_thai = $request->trang_thai; 
        $banner->save();

        return redirect()->route('banner.index')->with('success', 'Cập nhật Banner thành công.');
    }


    public function destroy(Banner $banner)
    {
        // Nếu banner có hình ảnh, cũng xóa hình ảnh đó khỏi storage.
        if ($banner->hinh_anh && Storage::disk('public')->exists($banner->hinh_anh)) {
            Storage::disk('public')->delete($banner->hinh_anh);
        }

        $banner->delete();

        return response()->json(['success' => true]);
    }
    public function updateStatus(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $banner->trang_thai = $request->trang_thai;
        $banner->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Trạng thái đã được cập nhật.'
        ]);
    }
}
