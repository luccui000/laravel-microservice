<?php

namespace App\Http\Controllers;

use App\Jobs\CommentProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\ProductVariant;
use Luccui\ShareData\Models\ProductVariantOption;
use Luccui\ShareData\Models\Sku;
use Luccui\ShareData\Models\SkuProductVariantOption;
use Luccui\ShareData\Repositories\ProductVariant\ProductVariantRepository;
use Luccui\ShareData\Repositories\Rate\RateRepository;
use Luccui\ShareData\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    private $_productRepo;
    private $_rateRepo;
    private $_productVariantRepo;

    public function __construct(
        ProductRepository $productRepository,
        RateRepository $rateRepository,
        ProductVariantRepository $productVariantRepository
    ) {
        $this->_productRepo = $productRepository;
        $this->_rateRepo = $rateRepository;
        $this->_productVariantRepo = $productVariantRepository;
    }

    public function index(Request  $request): JsonResponse
    {
        try {
			$products = $this->_productRepo->getProducts($request);

			return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            \DB::beginTransaction();
            $variants = $request->get('variants');
            $skus = $request->get('skus');

            $product = $this->_productRepo->store($request);

            $productVariantOptions = [];
            $productVariants = [];

            $index = 0;
            foreach ($variants as $variant) {
                $productVariant = ProductVariant::create([
                    'name' => $variant['name'],
                    'product_id'    => $product->id
                ]);
                $productVariants[] = $productVariant;

                $values = $variant['value'];
                foreach ($values as $value) {
                    $productVariantOption = ProductVariantOption::create([
                        'name' => $value,
                        'product_variant_id' => $productVariant->id
                    ]);

                    $productVariantOptions[] = $productVariantOption;

                    $sku = Sku::create([
                        'sku' => $skus[$index]['sku'],
                        'price' => $skus[$index]['price'],
                        'product_id' => $product->id
                    ]);

                    $opts = SkuProductVariantOption::create([
                        'sku_id' => $sku->id,
                        'product_variant_id' => $productVariant->id,
                        'product_variant_option_id' => $productVariantOption->id
                    ]);
                    info($opts);
                }
                $index++;
            }

            \DB::commit();
            $product->load(['category', 'supplier']);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            \DB::rollBack();
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $product = $this->_productRepo
                ->with(['category', 'supplier', 'reviews.user', 'brand', 'colors', 'sizes', 'tags'])
                ->withCount(['reviews', 'sold'])
                ->find($id);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $product = $this->_productRepo->update($request, $id);
            $product->load(['category', 'supplier']);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $product = $this->_productRepo->destroy($id);
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function productRates($productId): JsonResponse
    {
        try {
            $product = $this->_productRepo->find($productId);
            if(!$product) {
                return $this->jsonError(new \Exception('Không tìm thấy'));
            }

            $rates = $this->_rateRepo
                ->with(['user'])
                ->where('product_id', $productId)
                ->get();
            return $this->jsonData($rates);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function productVariants($productId)
    {
        try {
            $product = $this->_productRepo->find($productId);
            if(!$product) {
                return $this->jsonError(new \Exception('Không tìm thấy'));
            }

            $variants = $this->_productVariantRepo
                ->getProductVariantByProductId($productId);

            return $this->jsonData($variants);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
    public function commentProduct($id, Request $request)
    {
        try {
            $data = [
                'product_id' => $id,
                'customer_id' => $request->get('customer_id'),
                'comment' => $request->get('comment'),
                'vote' => $request->get('vote'),
            ];

            CommentProduct::dispatch($data)->onQueue('product_queue');

            return $this->jsonData($data);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
