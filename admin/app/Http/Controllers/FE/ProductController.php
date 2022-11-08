<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Http\Requests\FE\RateRequest;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Rate\RateRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $_productRepo;
    private $_rateRepo;

    public function __construct(
        ProductRepository $productRepository,
        RateRepository $rateRepository
    ) {
        $this->_productRepo = $productRepository;
        $this->_rateRepo = $rateRepository;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $products = $this->_productRepo->index();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show(Request $request, $id): JsonResponse
    {
        try {
            $product = $this->_productRepo->find($id);

            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function top10BestSeller(Request $request): JsonResponse
    {
        try {
            $products = $this->_productRepo->getTop10Product();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function top10New(): JsonResponse
    {
        try {
            $products = $this->_productRepo->getTop10NewArrived();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function top10Hot(): JsonResponse
    {
        try {
            $products = $this->_productRepo->getTop10Hot();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function rate(RateRequest $request, $id): JsonResponse
    {
        $user_id = $request->user()->id;

        try {
            $product = $this->_productRepo->find($id);

            if(!$product)
                $this->jsonError([
                    'error' => 'Product not found'
                ]);

            $rate = $this->_rateRepo->where([
                'product_id' => $id,
                'user_id' => $user_id
            ]);
            if($rate->exists())
                return $this->jsonMessage('User voted');

            $rate = $this->_rateRepo->create([
                'product_id'    => $id,
                'user_id'       => $user_id,
                'vote'          => $request->vote,
                'comment'       => $request->comment,
            ]);

            return $this->jsonData($rate);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
