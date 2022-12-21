<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Comment\CommentRepository;
use Luccui\ShareData\Repositories\Customer\CustomerRepository;
use Luccui\ShareData\Repositories\Order\OrderRepository;
use Luccui\ShareData\Repositories\Product\ProductRepository;

class ReportController extends Controller
{
    private $_productRepo;
    private $_orderRepo;
    private $_customerRepo;
    private $_commentRepo;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        CustomerRepository $customerRepository,
        CommentRepository $commentRepository
    ) {
        $this->_productRepo = $productRepository;
        $this->_orderRepo = $orderRepository;
        $this->_customerRepo = $customerRepository;
        $this->_commentRepo = $commentRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Description
     * @Author MinhLuc
     * @Date 21/12/2022
     */
    public function overview(Request $request): JsonResponse
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
                'sale_in_month' => $this->_orderRepo->saleIn30Day(),
                'total_comment' => $this->_commentRepo->totalComments(),
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Description
     * @Author MinhLuc
     * @Date 21/12/2022
     */
    public function bestSeller(Request $request): JsonResponse
    {
        try {
            $products = $this->_productRepo->bestSeller();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
