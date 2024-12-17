<?php

namespace App\Http\Controllers\Payment;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\InvoiceEmailJob;
use App\Jobs\SendRawEmailJob;
use App\Models\ContributorCommissionEarning;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\ThongBao;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Random\RandomException;

class VnPayController extends Controller
{

    protected $order;
    protected $zalopay;

    /**
     * @throws RandomException
     */
    public function createPayment(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->zalopay = new  ZalopayController();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_TmnCode = "6900EP55"; // Mã TmnCode của bạn
        $vnp_HashSecret = "2OG9FVAWF5R2RMV8QYUEK1IROBNOE3TQ"; // Mã HashSecret của bạn
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
         // URL trả về

        $startTime = now()->format('YmdHis');
        $expire = now()->addMinutes(15)->format('YmdHis');
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $_POST['amount'] ?? 10000; // Số tiền thanh toán
        $vnp_Locale = $_POST['language'] ?? 'vi'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $_POST['bankCode'] ?? ''; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'] ?? ''; //IP Khách hàng thanh toán

        $user_id = auth()->user()->id;
        $sach_id = $request->input('sach_id');
        $payment_method = $request->input('payment_method');
        $orderId = $this->zalopay->generateOrderId();
        $orderInfo = $request->input('orderInfo', 'Thanh toán qua Vnpay');
        $amount = $request->input('amount');

        $book = Sach::with('user')->find($sach_id);
        if ($book->trang_thai !== 'hien' || $book->kiem_duyet !== 'duyet' || $book->user->trang_thai !== 'hoat_dong') {
            return redirect()->route('home')->with('error', 'Có lỗi xảy ra.');
        }

        $existingOrder = DonHang::query()->where('sach_id', $sach_id)
            ->where('user_id', auth()->user()->id)
            ->where('trang_thai', 'that_bai')
            ->first();

        $processingOrder = DonHang::query()->where('sach_id', $sach_id)
            ->where('user_id', auth()->user()->id)
            ->where('trang_thai', 'dang_xu_ly')
            ->first();

        $processingOrderCount = DonHang::query()
            ->where('user_id', $user_id)
            ->where('trang_thai', 'dang_xu_ly')
            ->get();

        if (count($processingOrderCount) >= 3) {
            return redirect()->route('home')->with('error', 'Bạn đang có quá nhiều đơn hàng chưa thanh toán !');
        }

        if (!$amount || !$payment_method || !$orderInfo) {
            return redirect()->route('home')->with('error', 'Thông tin thanh toán không hợp lệ.');
        }

        if ($processingOrder) {
            return redirect()->route('home')->with('error', 'Bạn đang có một giao dịch tương tự cần hoàn thành.');
        }

        //nếu có thì dùng lại đơn này
        if ($existingOrder) {
            $existingOrder->so_tien_thanh_toan = $amount;
            $existingOrder->phuong_thuc_thanh_toan_id = $payment_method;
            $existingOrder->mo_ta = $orderInfo;
            $existingOrder->trang_thai = 'dang_xu_ly';
            $existingOrder->expires_at = now()->addMinutes(15)->toDateTimeString();
            $existingOrder->save();

            $this->order = $existingOrder;
        } else { // không thì tạo đơn mới
            $donhangData = [
                'sach_id' => $sach_id,
                'user_id' => $user_id,
                'phuong_thuc_thanh_toan_id' => $payment_method,
                'ma_don_hang' => $orderId,
                'so_tien_thanh_toan' => $amount,
                'mo_ta' => $orderInfo,
                'trang_thai' => 'dang_xu_ly',
                'expires_at' => now()->addMinutes(15)->toDateTimeString(),
            ];
            $donhang = DonHang::query()->create($donhangData);
            $this->order = $donhang;
        }

        $vnp_Returnurl = route('payment.vnpay.callback', ['order_id' => $this->order->id]);

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD: " . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        $this->order->payment_link = $vnp_Url;
        $this->order->save();

        header('Location: ' . $vnp_Url);
        die();
    }

    public function callBack(Request $request): \Illuminate\Http\RedirectResponse
    {
        $status = $request->query('vnp_ResponseCode');
        $orderid = $request->query('order_id');
        $order = DonHang::with('user', 'sach')->find($orderid);

        // Nếu đơn hàng đã có trạng thái 'thanh_cong', tránh xử lý lại
        if ($order->trang_thai == 'thanh_cong') {
            return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công');
        }

        if ($status === '00' ) {
            $order->trang_thai = 'thanh_cong';
            $order->payment_link = null;
            $order->save();

            $amount = $order->so_tien_thanh_toan;
            $book = $order->sach;
            $bookOwner = $book->user;
            $userRate = $bookOwner->getCommissionRate();

            // Lấy admin duy nhất
            $admin = User::whereHas('vai_tros', function ($query) {
                $query->where('vai_tro_id', VaiTro::ADMIN_ROLE_ID);
            })->first();

            $rose = 0; // Số tiền cộng tác viên nhận
            $roseForAdmin = 0; // Số tiền admin nhận

            if ($bookOwner->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                // Cộng tác viên đăng sách
                $rose = $amount * $userRate;
                $roseForAdmin = $amount * (1 - $userRate);

                // Cập nhật số dư
                $bookOwner->so_du += $rose;
                $bookOwner->save();

                $admin->so_du += $roseForAdmin;
                $admin->save();

                //Lưu lịch sử nhận hoa hồng của ctv
                ContributorCommissionEarning::query()->create([
                    'user_id' => $bookOwner->id,
                    'id_don_hang' => $order->id,
                    'commission_amount' => $rose,
                    'commission_rate' => $bookOwner->getCommissionRate(),
                    'admin_earnings' => $roseForAdmin,
                ]);

                // Thông báo cho cộng tác viên
                $url = route('notificationDonHang', ['id' => $order->id]);
                $noiDung = 'Bạn đã nhận được ' . number_format($rose, 0, ',', '.') . ' VND từ đơn hàng "' . $order->ma_don_hang . '".';
                $notificationContributor = ThongBao::create([
                    'user_id' => $bookOwner->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $noiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tai_chinh',
                ]);

                broadcast(new NotificationSent($notificationContributor));

//                Mail::raw($noiDung . ' Xem chi tiết đơn hàng tại đây: ' . $url, function ($message) use ($bookOwner) {
//                    $message->to($bookOwner->email)
//                        ->subject('Thông báo nhận tiền từ đơn hàng');
//                });

                SendRawEmailJob::dispatch(
                    $bookOwner->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $noiDung . ' Xem chi tiết đơn hàng tại đây: ' . $url
                );

                // Thông báo cho admin
                $adminNoiDung = 'Bạn đã nhận được ' . number_format($roseForAdmin, 0, ',', '.') . ' VND từ đơn hàng "' . $order->ma_don_hang . '".';

                $notificationAdmin = ThongBao::create([
                    'user_id' => $admin->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $adminNoiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($notificationAdmin));

//                Mail::raw($adminNoiDung . ' Xem chi tiết tại đây: ' . $url, function ($message) use ($admin) {
//                    $message->to($admin->email)
//                        ->subject('Thông báo nhận tiền từ đơn hàng');
//                });

                SendRawEmailJob::dispatch(
                    $admin->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $adminNoiDung . ' Xem chi tiết tại đây: ' . $url
                );
            } elseif ($bookOwner->hasRole(VaiTro::ADMIN_ROLE_ID)) {
                // Admin đăng sách
                $rose = $amount;
                $admin->so_du += $rose;
                $admin->save();

                // Thông báo cho admin
                $url = route('notificationDonHang', ['id' => $order->id]);
                $adminNoiDung = 'Bạn đã nhận được ' . number_format($rose, 0, ',', '.') . ' VND từ đơn hàng "' . $order->ma_don_hang . '".';

                $notificationAdmin = ThongBao::create([
                    'user_id' => $admin->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $adminNoiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($notificationAdmin));

                SendRawEmailJob::dispatch(
                    $admin->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $adminNoiDung . ' Xem chi tiết tại đây: ' . $url
                );
            }

            InvoiceEmailJob::dispatch($order->user->email, $order);

            return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công!');
        }
        else {
            $order->trang_thai = 'that_bai';
            $order->payment_link = null;
            $order->save();
            return redirect()->route('home')->with('error', 'Đơn hàng bị hủy');
        }
    }

}
