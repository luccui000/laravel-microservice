<?php

namespace App\Http\Controllers\FE;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Sku;
use Luccui\ShareData\Models\Order;
use App\Http\Controllers\Controller;
use Luccui\ShareData\Models\Product;
use App\Http\Requests\FE\OrderRequest;
use Luccui\ShareData\Enums\StatusEnum;
use Luccui\ShareData\Models\DetailOrder;
use Luccui\ShareData\Enums\PaymentTypeEnum;
use Luccui\ShareData\Repositories\Order\OrderRepository;
use Luccui\ShareData\Repositories\DetailOrder\DetailOrderRepository;

class OrderController extends Controller
{
    private $_orderRepo;
    private $_detailOrderRepo;

    public function __construct(
        OrderRepository $orderRepository,
        DetailOrderRepository $detailOrderRepository
    )
    {
        $this->_orderRepo = $orderRepository;
        $this->_detailOrderRepo = $detailOrderRepository;
    }

    public function makeOrder(OrderRequest $request)
    {
        try {
            $customer = $request->user();

            $order = $this->_orderRepo->store($request);

            return $this->jsonData($order);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function addToCart(Request $request)
    {
        try {
            $customer = $request->user();

            \DB::beginTransaction();

            $existOrder = Order::where([
                'customer_id' => $customer->id,
                'status' => StatusEnum::IN_CART
            ])->first();

            $productId = $request->get('product_id');
            $skuId = $request->get('sku_id');
            $qty = $request->get('qty', 1);

            $now = Carbon::now();

            if($existOrder) {
                $existDetailOrder = DetailOrder::where([
                    'order_id' => $existOrder->id,
                    'product_id' => $productId
                ])->first();

                if($existDetailOrder) {
                    $existDetailOrder->update([
                        'quantity' => $qty + $existDetailOrder->quantity
                    ]);
                } else {
                    $this->createDetailOrderItem(
                        $existOrder,
                        $productId,
                        $skuId,
                        $qty
                    );
                }
                // $existOrder->recalculateSubTotal();

                \DB::commit();
                return $this->jsonData($existOrder);
            } else {
                $newOrder = Order::create([
                    'customer_id' => $customer->id,
                    'order_number' => \Str::random(10),
                    'ship_date' => $now,
                    'sub_total' => 0,
                    'total' => 0,
                    'discount' => $request->get('discount', 0),
                    'status' => StatusEnum::IN_CART,
                    'payment_type_id' => PaymentTypeEnum::THANH_TOAN_KHI_NHAN_HANG
                ]);

                $this->createDetailOrderItem(
                    $newOrder,
                    $productId,
                    $skuId,
                    $qty
                );

                // $newOrder->recalculateSubTotal();

                \DB::commit();
                return $this->jsonData($newOrder);
            }

        } catch(\Exception $e) {
            \DB::rollBack();
            return $this->jsonError($e);
        }
    }

    public function createDetailOrderItem($order, $productId, $skuId, $qty)
    {
        $product = Product::find($productId);

        if($product) {
            $price = 0;

            if($product->has_variant) {
                $sku = Sku::find($skuId);
                if($sku) {
                    $price = $sku->price;
                }
            } else {
                $price = $product->sell_price;
            }

            DetailOrder::create([
                'product_id' => $productId,
                'order_id' => $order->id,
                'sku_id' => $skuId,
                'name' => $product->name,
                'price' => $price,
                'quantity' => $qty,
                'total' => $price * $qty
            ]);
        }
    }

    public function getOrder(Request $request)
    {
        try {
            $customer = $request->user();

            $orders = $this->_orderRepo
                ->where('customer_id', $customer->id)
                ->with(['details.product', 'coupon'])
                ->first();

            return $this->jsonData($orders);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
