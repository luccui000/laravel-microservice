<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Luccui\ShareData\Repositories\DetailOrder\DetailOrderRepository;
use Luccui\ShareData\Repositories\Order\OrderRepositoryInterface;
use Luccui\ShareData\Repositories\Product\ProductRepository;
use Luccui\ShareData\Repositories\Sku\SkuRepository;

class OrderController extends Controller
{
    private $_orderRepo;
    private $_detailOrderRepo;
    private $_productRepo;
    private $_skuRepo;

    public function __construct(
        OrderRepositoryInterface $orderRepo,
        DetailOrderRepository $detailOrderRepo,
        ProductRepository $productRepository,
        SkuRepository $skuRepository
    )
    {
        $this->_orderRepo = $orderRepo;
        $this->_detailOrderRepo = $detailOrderRepo;
        $this->_productRepo = $productRepository;
        $this->_skuRepo = $skuRepository;
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
        try {
            DB::beginTransaction();

            $items = $request->get('items');
            $order = $this->_orderRepo->makeOrder($request);
            $subTotal = 0;

            foreach ($items as $item) {
                $skuId =    $item['sku_id'];
                $sku = $this->_skuRepo->find($skuId);
                if($sku)
                    continue;

                $productId = $sku->product_id;
                $product = $this->_productRepo->find($productId);

                if(!$product)
                    continue;

                $this->_detailOrderRepo->makeOrderDetail(
                    $order->id,
                    $product->id,
                    $sku->id,
                    $product->name,
                    $sku->price,
                    $item['quantity'],
                );

                $subTotal += $product->price * $item['quantity'];
            }
            $order->sub_total = $subTotal;
            $order->total = (int)$subTotal - (int)$order->discount;

            $order->save();
            DB::commit();
            $order->load('details');
            return $this->jsonData($order);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $order = $this->_orderRepo->find($id);
            return $this->jsonData($order);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $order = $this->_orderRepo->find($id);
            if(!$order)
                return $this->jsonMessage('Not found');
            $order = $this->_orderRepo->update($id, $request);

            return $this->jsonData($order);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $order = $this->_orderRepo->find($id);
            if(!$order)
                return $this->jsonMessage('Not found');

            $order = $this->_orderRepo->destroy($id);

            return $this->jsonMessage('Deleted');
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
