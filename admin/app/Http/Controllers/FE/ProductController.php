<?php

namespace App\Http\Controllers\FE;

use App\Jobs\CommentProduct;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\FE\AddToCartProductRequest;
use App\Http\Requests\FE\RateRequest;
use App\Http\Requests\FE\AskProducRequest;
use Luccui\ShareData\Repositories\Rate\RateRepository;
use Luccui\ShareData\Repositories\ProductContact\ProductContactRepository;
use Luccui\ShareData\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    private $_productRepo;
    private $_rateRepo;
    private $_productContactRepo;

    public function __construct(
        ProductRepository $productRepository,
        RateRepository $rateRepository,
        ProductContactRepository $productContactRepository
    ) {
        $this->_productRepo = $productRepository;
        $this->_rateRepo = $rateRepository;
        $this->_productContactRepo = $productContactRepository;
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
                'customer_id' => $user_id
            ])->first();

            if(!$rate)
                return $this->jsonMessage('User voted');

            CommentProduct::dispatch([
                'product_id'    => $id,
                'customer_id'   => $user_id,
                'vote'          => $request->get('vote'),
                'comment'       => $request->get('comment'),
            ])->onQueue('product_queue');

            return $this->jsonData($rate);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function newArrival()
    {
        try {
            $products = $this->_productRepo->newArrival(8);
            return $this->jsonData($products);
        }  catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function ask(AskProducRequest $request)
    {
        try {
            $productContact = $this->_productContactRepo->store($request);
            return $this->jsonData($productContact);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function addToCart(AddToCartProductRequest $request)
    {
        try {
            dd($request->all());
            // $carts = $this
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function popular(Request $request)
    {
        try {
            $limit = $request->get('limit', 3);
            $products = $this->_productRepo->popularProduct($limit);

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function related(Request $request)
    {
        try {
            $products = $this->_productRepo->relatedProduct($request);
            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
