<?php

namespace App\Http\Controllers;

use Luccui\ShareData\Repositories\Product\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $_productRepo;

    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->_productRepo = $productRepository;
    }

    public function index(): JsonResponse
    {
        try {
            $products = $this->_productRepo
                ->with(['category', 'supplier'])
                ->paginate();

            return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $product = $this->_productRepo->store($request);
            $product->load(['category', 'supplier']);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $product = $this->_productRepo->find($id);
            $product->load(['category', 'supplier']);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = $this->_productRepo->update($request, $id);
            $product->load(['category', 'supplier']);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = $this->_productRepo->destroy($id);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
