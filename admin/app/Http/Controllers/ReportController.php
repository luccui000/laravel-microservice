<?php

namespace App\Http\Controllers;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $_productRepo;
    private $_orderRepo;
    private $_customerRepo;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        CustomerRepository $customerRepository
    ) {
        $this->_productRepo = $productRepository;
        $this->_orderRepo = $orderRepository;
        $this->_customerRepo = $customerRepository;
    }

    public function overview(Request $request)
    {
        try {
            return $this->jsonData([
                'amount' => [
                    'product'   => $this->_productRepo->count(),
                    'customer'  => $this->_customerRepo->count(),
                    'order'     => [
                        'total'     => $this->_orderRepo->count(),
                        'completed' => $this->_orderRepo->completed()->count(),
                        'unfinished'=> $this->_orderRepo->unfinished()->count(),
                    ],
                ],
                'orders'        => $this->_orderRepo->orderInPreviouseDay(),
                'customers'     => $this->_customerRepo->customerIn7PreviousDay(),
                'sale_in_month' => $this->_orderRepo->saleIn30Day()
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function bestSeller(Request $request)
    {
        try {
            $products = $this->_productRepo->bestSeller();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
