<?php

namespace App\Http\Controllers\Payment;

//use App\Events\MessageSent;
use App\Events\NewOrderNotification;
use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\InvoiceEmailJob;
use App\Jobs\SendRawEmailJob;
use App\Mail\InvoiceMail;
use App\Models\ContributorCommissionEarning;
use App\Models\Sach;
use App\Models\ThongBao;
use App\Models\VaiTro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\DonHang;
use Illuminate\Support\Facades\Mail;

class ZalopayController extends Controller
{
//    protected $order_id;
    protected $order;

    public function generateOrderId(): string
    {
        $prefix = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4));
        $middle = rand(1000, 9999);
        $suffix = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4));
        $timestamp = time();

        return $prefix . $middle . $suffix . $timestamp;
    }

    public function createPayment(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $config = [
            "app_id" => 2553,
            "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
//            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
        ];

        $items = '[]';
        $transID = rand(0, 1000000);

        //Lấy dữ liệu để tạo || sửa đơn hàng đã tạo trước đó
        $user_id = auth()->user()->id;
        $sach_id = $request->input('sach_id');
        $payment_method = $request->input('payment_method');
        $orderId = $this->generateOrderId();
        $orderInfo = $request->input('orderInfo', 'Thanh toán qua Zalopay');
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

//        $embeddata = '{"redirecturl": "http://localhost:8000/payment/zalopay/callback?orderid=' . $this->order->id . '"}';
        $embeddata = '{"redirecturl": "' . route('payment.zalopay.callback', ['orderid' => $this->order->id]) . '"}';


        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000),
            "app_trans_id" => date("ymd") . "_" . $transID,
            "app_user" => "user123",
            "item" => $items,
            "embed_data" => $embeddata,
            "amount" => $amount,
            "description" => "Lazada - Payment for the order #$transID",
            "bank_code" => "zalopayapp",
        ];

        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
            . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

        $response = Http::withoutVerifying()->asForm()->post($config["endpoint"], $order);

        $result = $response->json();

        if ($response->failed()) {
            return response()->json(['error' => 'Request failed'], 500);
        }

        if (isset($result['order_url'])) {
            $this->order->payment_link = $result['order_url'];
            $this->order->save();
            return redirect($result['order_url']);
        }

        return response()->json($result);
    }

    public function callBack(Request $request): \Illuminate\Http\RedirectResponse
    {
        $status = $request->query('status');
        $orderid = $request->query('orderid');
        $order = DonHang::with('user', 'sach')->find($orderid);

        // Nếu đơn hàng đã có trạng thái 'thanh_cong', tránh xử lý lại
        if ($order->trang_thai == 'thanh_cong') {
            return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công');
        }

        if ($status === "1") {
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























