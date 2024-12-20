<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\YeuThich;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TrangCaNhanController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|string|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

         // Lấy tất cả thông báo của người dùng
         $thongBaos = ThongBao::where('user_id', $user->id)
         ->orderBy('created_at', 'desc')
         ->paginate(10);


        $page = $request->input('page', 1);

        // Lọc theo tên sách yêu thích
        $sachYeuThichQuery = YeuThich::with( 'sach.user')
            ->where('user_id', $user->id)
            ->whereHas('sach.user', function ($q) {
                $q->where('trang_thai', 'hoat_dong');
            });

        // Kiểm tra nếu có từ khóa tìm kiếm
        $sachYeuThichSearch = $request->input('sach_yeu_thich', '');
        if ($sachYeuThichSearch) {
            $sachYeuThichQuery->whereHas('sach', function ($query) use ($sachYeuThichSearch) {
                $query->where('ten_sach', 'like', '%' . $sachYeuThichSearch . '%');
            });
        }

        // Phân trang kết quả
        $danhSachYeuThich = $sachYeuThichQuery->latest('id')->paginate(5, ['*'], 'page', $page);

        $tenSach = $request->input('ten_sach', '');  // Lấy tên sách từ form tìm kiếm

        // Lọc theo tên sách
        $sachDaMua = DonHang::with('sach.user', 'user')
            ->where('user_id', $user->id)
            ->where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) use ($tenSach) {
                if ($tenSach) {
                    $query->where('ten_sach', 'like', '%' . $tenSach . '%');  // Lọc theo tên sách
                }
            })
            ->latest('id')
            ->paginate(5, ['*'], 'page', $page);


        $lichSuGiaoDich = DonHang::where('user_id', $user->id)
            ->with('sach', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->orderByRaw("CASE WHEN trang_thai = 'dang_xu_ly' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->latest('id')
            ->paginate(5);

        if ($request->ajax()) {
            $section = $request->input('section');
            if ($section == 'purchased') {

                return view('client.pages.sach-da-mua', compact('sachDaMua'))->render();
            } elseif ($section == 'lich-su-giao-dich') {

                return view('client.pages.lich-su-giao-dich', compact('lichSuGiaoDich'))->render();
            } else {
                return view('client.pages.sach-yeu-thich', compact('danhSachYeuThich'))->render();
            }
        }

        return view('client.pages.trang-ca-nhan', compact('user', 'danhSachYeuThich', 'sachDaMua', 'lichSuGiaoDich', 'thongBaos'));
    }


    public function update(Request $request, $id): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'ten_doc_gia' => 'required|regex:/^[\p{L}\s]+$/u|max:255',
            'but_danh' => 'nullable|string|max:255',
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'unique:users,email,' . $id
            ],
            'so_dien_thoai' => 'nullable|regex:/^\+?\d{10,15}$/',
            'dia_chi' => 'required|string|max:255',
            'sinh_nhat' => 'nullable|date|before_or_equal:today|unique:users,sinh_nhat,' . $user->id,
            'hinh_anh' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'gioi_tinh' => 'nullable|string|max:255',
        ], [
            'ten_doc_gia.regex' => 'Tên độc giả chỉ được chứa chữ cái.',
            'so_dien_thoai.regex' => 'Số điện thoại phải là số và dài từ 10 đến 15 ký tự.',
            'email.required' => 'Email không được bỏ trống.',
            'email.regex' => 'Email không hợp lệ. Vui lòng nhập đúng định dạng email (vd: example@domain.com).',
            'dia_chi.required' => 'Địa chỉ không được bỏ trống.',
        ]);

        if ($request->hasFile('hinh_anh')) {
            if ($user->hinh_anh && Storage::disk('public')->exists($user->hinh_anh)) {
                Storage::disk('public')->delete($user->hinh_anh);
            }
            $filePath = $request->file('hinh_anh')->store('uploads/avatar-user', 'public');
        } else {
            $filePath = $user->hinh_anh;
        }

        $data['hinh_anh'] = $filePath;

        try {
            $user->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $yeuThich = YeuThich::findOrFail($id);

        $yeuThich->delete();

        return response()->json(['success' => true, 'message' => 'Xóa thành công!']);
    }

    public function doiMatKhau(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        \Log::info($request->all());

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Mật khẩu hiện tại không chính xác.');
                    }
                },
            ],
            'new_password' => [
                'bail',
                'required',
                'string',
                'min:8',
                'different:old_password',
                'confirmed'
            ],
            'new_password_confirmation' => 'required|same:new_password',
           'g-recaptcha-response' => 'required',
        ], [
            'new_password.min' => 'Mật khẩu mới tối thiểu 8 kí tự',
            'new_password.different' => 'Mật khẩu mới bắt buộc khác mật khẩu cũ',
            'old_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password_confirmation.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'new_password_confirmation.same' => 'Mật khẩu xác nhận và mật khẩu mới phải giống nhau.',
            'new_password.confirmed' => 'Xác nhận trường mật khẩu mới không khớp.',
            'g-recaptcha-response.required'=>'Vui lòng xác thực bạn không phải là người máy',
        ]);

        if ($validator->fails()) {
            // \Log::error('Validation errors:', $validator->errors()->toArray());
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Mật khẩu đã được cập nhật thành công.'
        ]);
    }


    public function lichSuGiaoDich($id): \Illuminate\Http\JsonResponse
    {
        $giaoDich = DonHang::query()->where('id', $id)
            ->with('sach.user', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->first();

        if (!$giaoDich) {
            return response()->json(['error' => 'Giao dịch không tồn tại'], 404);
        }

        return response()->json([
            'id' => $giaoDich->id,
            'ten_doc_gia' => $giaoDich->user->ten_doc_gia,
            'ngay_thanh_toan' => $giaoDich->created_at->format('d-m-Y'),
            'tong_tien' => number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.'),
            'phuong_thuc' => $giaoDich->phuongThucThanhToan->ten_phuong_thuc,
            'trang_thai' => $giaoDich->trang_thai,
            'id_sach' => $giaoDich->sach->id,
            'hinh_anh' => Storage::url($giaoDich->sach->anh_bia_sach),
            'email' => $giaoDich->user->email,
            'so_dien_thoai' => $giaoDich->user->so_dien_thoai,
            'ten_sach' => $giaoDich->sach->ten_sach,
            'tac_gia' => $giaoDich->sach->user->ten_doc_gia,
            'payment_link' => $giaoDich->payment_link,
        ]);
    }

    public function lichSuGiaoDichAjax($id): \Illuminate\Http\JsonResponse
    {
        $lichSuGiaoDich = DonHang::where('id', $id)->with('sach.user', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->paginate(5);

        return response()->json($lichSuGiaoDich);
    }
}
