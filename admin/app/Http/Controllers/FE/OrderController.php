<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FE\OrderRequest;
use Luccui\ShareData\Repositories\DetailOrder\DetailOrderRepository;
use Luccui\ShareData\Repositories\Order\OrderRepository;

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

    public function order(OrderRequest $request)
    {
        try {
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
            $productId = $request->get('product_id');
            $skuId = $request->get('sku_id');
            $qty = $request->get('qty');


            $$order = $this->_orderRepo->where('customer_id', $customer->id)
                ->first();

            if($$order) {
                $detailOrders = $this->_detailOrderRepo
                    ->where('order_id', $order->id)
                    ->where('product_id', $productId)
                    ->get();

                if($detailOrders) {
                    $detailOrders->sku_id = $skuId;
                    $detailOrders->quantity = $qty;
                    $detailOrders->save();
                } else {
                    $this->_detailOrderRepo->makeOrderDetail([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'sku_id' => $skuId,
                        'quantity' => $qty,
                    ]);
                }

            } else {
                $order = $this->_orderRepo->makeOrder($request);
                $this->_detailOrderRepo->makeOrderDetail([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'sku_id' => $skuId,
                    'quantity' => $qty,
                ]);
            }

            return $this->jsonData($order);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function getOrder(Request $request)
    {
        try {
            $customer = $request->user();
            $orders = $this->_orderRepo
                ->where('customer_id', $customer->id)
                ->with('details')
                ->get();
            return $this->jsonData($orders);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
