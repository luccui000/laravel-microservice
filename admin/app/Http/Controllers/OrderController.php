<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Order\OrderRepository;

class OrderController extends Controller
{
    private $_orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
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
            $orders = $this->_orderRepo
                ->all();

            return $this->jsonData($orders);
        } catch (\Exception $ex) {
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
