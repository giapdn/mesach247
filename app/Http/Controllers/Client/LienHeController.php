<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LienHe;
use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_khach_hang' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'chu_de' => 'required|string|max:255',
            'noi_dung' => 'required',
            'anh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $filePath = null;
        if ($request->hasFile('anh')) {
            // Store the uploaded image in the specified directory
            $filePath = $request->file('anh')->store('uploads/anh_lien_he', 'public');
        }
        $contact = LienHe::create([
            'user_id' => auth()->id(),
            'ten_khach_hang' => $validatedData['ten_khach_hang'],
            'email' => $validatedData['email'],
            'chu_de' => $validatedData['chu_de'],
            'noi_dung' => $validatedData['noi_dung'],
            'anh' => $filePath,
            'trang_thai' => 'mo',
        ]);

        $adminUsers = User::whereHas('vai_tros', function ($query) {
            $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
        })->get();

        foreach ($adminUsers as $adminUser) {
//            $url = route('notificationCTV', ['id' => $contact->id]); // Assuming you want to pass the contact ID
            Mail::raw('Có một liên hệ mới từ "' . $validatedData['ten_khach_hang'] . '". Vui lòng kiểm duyệt. Bạn có thể xem chi tiết tại: ' , function ($message) use ($adminUser) {
                $message->to($adminUser->email)
                    ->subject('Liên hệ mới cần kiểm duyệt');
            });
            ThongBao::create([
                'user_id' => $adminUser->id,
                'tieu_de' => 'Có một liên hệ mới cần kiểm duyệt',
                'noi_dung' => 'Liên hệ của "' . $validatedData['ten_khach_hang'] . '" đã được gửi và đang chờ xác nhận.',
                'url' => null,
                'trang_thai' => 'chua_xem',
                'type' => 'lienHe',
            ]);
        }
        return redirect()->back()->with('success', 'Liên hệ của bạn đã được gửi thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
