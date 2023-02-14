<?php

namespace App\Http\Controllers\FE;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Order;
use App\Contracts\ThanhToanGateway;
use Luccui\ShareData\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Jobs\MonitorOrderPayment;
use App\Jobs\SendMailOrderSuccess;
use Luccui\ShareData\Enums\StatusEnum;
use Luccui\ShareData\Models\DetailOrder;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller {
    private $thanhToanService;

    public function __construct(
        ThanhToanGateway $thanhToanService
    )
    {
        $this->thanhToanService = $thanhToanService;
    }

    public function updateQuantity($detailId, Request $request)
    {
        try {
            $detail = DetailOrder::find($detailId);
            if(!$detail)
                return $this->jsonError('Not found', Response::HTTP_BAD_GATEWAY);

            $quantity = $request->get('quantity', 1);
            $detail->quantity = $quantity;
            $detail->save();

            return $this->jsonData($detail);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function deleteProduct(Request $request) {
        try {
            $productId = $request->get('product_id');
            $customer = $request->user();
            $order = Order::where([
                'customer_id' => $customer->id,
                'status' => StatusEnum::IN_CART
            ])->first();

            if($order) {
                $detail = DetailOrder::where([
                    'product_id' => $productId,
                    'order_id' => $order->id
                ])->first();

                DetailOrder::find($detail->id)->delete();
                // $detail->detele();
            }

            return $this->jsonData('Deleted');
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function applyCoupon(Request $request)
    {
        try {
            $customer = $request->user();

            $couponName = $request->get('coupon');

            $coupon = Coupon::where(['code' => $couponName])->first();

            if(!$coupon)
                return $this->jsonErrorMessage('Mã giảm giá không hợp lệ');

            $order = Order::where([
                'customer_id' => $customer->id,
                'status' => StatusEnum::IN_CART
            ])->first();

            if(!$order)
                return $this->jsonError('Order not found');

            $order->coupon_id = $coupon->id;
            $order->save();

            return $this->jsonData($order);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function checkout(Request $request)
    {
        try {
            $paymentType = $request->get('payment_type', 1);
            $note = $request->get('note');

            $customer = $request->user();

            $order = Order::where([
                'customer_id' => $customer->id,
                'status' => StatusEnum::IN_CART
            ])->first();

            if(!$order) {
                return $this->jsonErrorMessage('Không tìm thấy sản phẩm nào trong giỏ hàng');
            }

            $order->payment_type_id = $paymentType;
            $order->note = $note;

            if($paymentType == 2) {
                $order->status = StatusEnum::CHECKOUT;

            } else if ($paymentType == 1) {
                $order->status = StatusEnum::PENDING;
            }
            $now = Carbon::now();
            $order->order_date = $now;
            $order->save();

            if($paymentType == 2) {
                $url = $this->thanhToanService->url([
                    'vnp_TxnRef' => $order->order_number,
                    'vnp_OrderInfo' => 'Thanh toan hoa don hang hoa',
                    'vnp_OrderType' => 'billpayment',
                    'vnp_Amount' => $order->total,
                    'vnp_Locale' => 'vn',
                    'vnp_IpAddr' => $request->ip(),
                ]);

                MonitorOrderPayment::dispatch($order);

                return $this->jsonData([
                    'url' => $url
                ]);
            } else {
                SendMailOrderSuccess::dispatch($order)->onQueue('mail_queue');
            }

            return $this->jsonData([
                'url' => null
            ]);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
