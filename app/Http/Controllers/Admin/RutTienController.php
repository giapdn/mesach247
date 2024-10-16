<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RutTien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RutTienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSachYeuCau = RutTien::with('user')->latest('id')->get();

        return view('admin.cong-tac-vien.yeu-cau-rut-tien', compact('danhSachYeuCau'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chiTietYeuCau = RutTien::findOrFail($id);

        return view('admin.cong-tac-vien.chi-tiet-rut-tien', compact('chiTietYeuCau'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $newStatus = $request->input('status');
            $contact = RutTien::find($id);

            if (!$contact) {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy yêu cầu.'], 404);
            }

            $currentStatus = $contact->trang_thai;

            // Kiểm tra trạng thái
            if (
                ($currentStatus == 'da_duyet' && $newStatus == 'dang_xu_ly') ||
                ($currentStatus == 'da_duyet' && $newStatus == 'da_huy') ||
                ($currentStatus == 'da_huy' && $newStatus == 'da_duyet') ||
                ($currentStatus == 'da_huy' && $newStatus == 'dang_xu_ly')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }

            $user = $contact->user;

            if ($newStatus == 'da_duyet') {
                if (!$user || $user->so_du < $contact->so_tien) {
                    return response()->json(['success' => false, 'message' => 'Số dư của cộng tác viên không đủ để duyệt yêu cầu rút tiền.'], 403);
                }
                $user->so_du -= $contact->so_tien;
                $user->save();
            }

            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json(['success' => true, 'new_balance' => number_format($user->so_du, 0, ',', '.') . ' VNĐ']);
        } catch (\Exception $e) {
            // Log error message
            \Log::error("Error updating status for ID {$id}: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi.'], 500);
        }
    }




}
