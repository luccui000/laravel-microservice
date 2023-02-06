<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use Luccui\ShareData\Models\Order;
use Luccui\ShareData\Models\Coupon;
use App\Http\Controllers\Controller;
use Luccui\ShareData\Enums\StatusEnum;
use Luccui\ShareData\Models\DetailOrder;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller {
    public function __construct()
    {

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

            info($couponName);
            $coupon = Coupon::where(['code' => $couponName])->first();

            info($coupon);

            if(!$coupon)
                return $this->jsonError('Coupon not found');

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
}
