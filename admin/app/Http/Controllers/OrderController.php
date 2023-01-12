<?php

namespace App\Http\Controllers;

use App\Jobs\AddDetailProductItem;
use App\Jobs\MonitorOrder;
use App\Jobs\SendMailConfirmOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Luccui\ShareData\Models\Sku;
use Luccui\ShareData\Repositories\DetailOrder\DetailOrderRepository;
use Luccui\ShareData\Repositories\Order\OrderRepository;
use Luccui\ShareData\Repositories\Product\ProductRepository;
use Luccui\ShareData\Repositories\Sku\SkuRepository;

class OrderController extends Controller
{
    private $_orderRepo;

    public function __construct(
        OrderRepository $orderRepo,
        DetailOrderRepository $detailOrderRepo,
        ProductRepository $productRepository,
        SkuRepository $skuRepository
    ) {
        $this->_orderRepo = $orderRepo;
    }

    public function index()
    {
        try {
            $orders = $this->_orderRepo
                ->all();

            return $this->jsonData($orders);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function orderProduct(Request $request, $productId)
    {
        try {
            $orders = $this->_orderRepo->all();

            return $this->jsonData($orders);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function makeOrder(Request $request)
    {
        try {
            $minute = config('constants.minute_decline');
            $items = $request->get('items');

            $subTotal = 0;
            foreach ($items as $item) {
                $subTotal += Sku::find($item['sku_id'])->price;
            }
            $discount = $request->get('discount', 0);
            $total = $subTotal - $discount;

            $request->merge([
                'sub_total' => $subTotal,
                'total' => $total
            ]);

            $order = $this->_orderRepo->makeOrder($request);

            foreach ($items as $item) {
                AddDetailProductItem::dispatch($order->toArray(), $item)->onQueue('order_queue');
            }

            // monitor handle transaction
            MonitorOrder::dispatch($order)->onQueue('order_queue');

            // handle send email into user here
            SendMailConfirmOrder::dispatch($order)->onQueue('mail_queue')->delay($minute);

            return $this->jsonData($order);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
