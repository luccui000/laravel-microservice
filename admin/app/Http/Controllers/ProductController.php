<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Jobs\CommentProduct;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Sku;
use Illuminate\Http\JsonResponse;
use Luccui\ShareData\Models\Size;
use Luccui\ShareData\Models\Brand;
use Luccui\ShareData\Models\Color;
use Luccui\ShareData\Models\Product;
use Luccui\ShareData\Models\Category;
use Luccui\ShareData\Models\ProductTag;
use Luccui\ShareData\Models\ProductVariant;
use Luccui\ShareData\Models\ProductVariantOption;
use Luccui\ShareData\Models\SkuProductVariantOption;
use Luccui\ShareData\Models\Tag;
use Luccui\ShareData\Repositories\Rate\RateRepository;
use Luccui\ShareData\Repositories\Product\ProductRepository;
use Luccui\ShareData\Repositories\ProductVariant\ProductVariantRepository;

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
			$products = Product::with(['colors', 'sizes', 'brand', 'supplier', 'category', 'skus'])->paginate();

			return $this->jsonData($products);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $products = Product::all();
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

    public function create(ProductRequest $request)
    {
        try {
            \DB::beginTransaction();
            $colors = $request->get('colors');
            $sizes = $request->get('sizes');
            $prices = $request->get('prices');
            $file = $request->get('image');

            $imagePath = saveImgBase64($file, 'uploads/products');

            $request->merge([
                'image' => $imagePath,
                'thumb' => $imagePath,
                'stock' => 1000
            ]);

            $product = $this->_productRepo->store($request);

            $hasVariant = $request->get('has_variant', false);
            $tags = $request->get('tags');

            foreach($tags as $tag) {
                $findTag = Tag::where('name', $tag)->first();

                if($findTag) {
                    ProductTag::insert([
                        'tag_id' => $findTag->id,
                        'product_id' => $product->id
                    ]);
                }
            }

            if($hasVariant) {
                foreach($colors as $color) {
                    $findColor = Color::where('name', $color)->first();
                    if($findColor) {
                        ProductColor::insert([
                            'product_id' => $product->id,
                            'color_id' => $findColor->id
                        ]);
                    }
                }

                foreach($sizes as $size) {
                    $findSize = Size::where('name', $size)->first();
                    ProductSize::insert([
                        'product_id' => $product->id,
                        'size_id' => $findSize->id
                    ]);
                }

                $categoryId = $request->get('category_id');
                $brandId = $request->get('brand_id');
                $supplierId = $request->get('supplier_id');
                $weight = $request->get('weight');
                $index = 0;

                foreach($colors as $color) {
                    foreach($sizes as $size) {
                        $categoryName = Category::find($categoryId)?->name;
                        $brandName = Brand::find($brandId)?->name;
                        $supplierName = Brand::find($supplierId)?->name;

                        $firstCate = \Str::upper($categoryName[0]);
                        $firstBrand = \Str::upper($brandName[0]);
                        $firstSupplier = \Str::upper($supplierName[0]);
                        $firstColor = \Str::upper($color[0]);
                        $firstSize = \Str::upper($size[0]);

                        $sku = $firstCate . $firstBrand . $firstSupplier . $weight . $firstColor . $firstSize;

                        $findColor = Color::where('name', $color)->first();
                        $findSize = Size::where('name', $size)->first();

                        if($findColor && $findSize) {
                            $sku = Sku::create([
                                'sku' => $sku,
                                'price' => $prices[$index++],
                                'product_id' => $product->id,
                                'color_id' => $findColor->id,
                                'size_id' => $findSize->id
                            ]);
                        }
                    }
                }
            }


            \DB::commit();
        } catch (\Exception $ex) {
            \DB::rollBack();
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $product = $this->_productRepo
                ->with(['category', 'supplier', 'reviews.user', 'brand', 'colors', 'sizes', 'tags', 'skus.color', 'skus.size'])
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
            \DB::beginTransaction();
            $product = $this->_productRepo->update($request, $id);

            $hasVariant = $request->get('has_variant', false);

            if($hasVariant) {
                $product->sizes()->detach();
                $product->colors()->detach();
                $colors = $request->get('colors');
                $sizes = $request->get('sizes');
                $prices = $request->get('prices');

                foreach($colors as $color) {
                    $findColor = Color::where('name', $color)->first();
                    if($findColor) {
                        ProductColor::insert([
                            'product_id' => $product->id,
                            'color_id' => $findColor->id
                        ]);
                    }
                }

                foreach($sizes as $size) {
                    $findSize = Size::where('name', $size)->first();
                    ProductSize::insert([
                        'product_id' => $product->id,
                        'size_id' => $findSize->id
                    ]);
                }

                $categoryId = $request->get('category_id');
                $brandId = $request->get('brand_id');
                $supplierId = $request->get('supplier_id');
                $weight = $request->get('weight');
                $index = 0;

                foreach($colors as $color) {
                    foreach($sizes as $size) {
                        $categoryName = Category::find($categoryId)?->name;
                        $brandName = Brand::find($brandId)?->name;
                        $supplierName = Brand::find($supplierId)?->name;

                        $firstCate = \Str::upper($categoryName[0]);
                        $firstBrand = \Str::upper($brandName[0]);
                        $firstSupplier = \Str::upper($supplierName[0]);
                        $firstColor = \Str::upper($color[0]);
                        $firstSize = \Str::upper($size[0]);

                        $sku = $firstCate . $firstBrand . $firstSupplier . $weight . $firstColor . $firstSize;

                        $findColor = Color::where('name', $color)->first();
                        $findSize = Size::where('name', $size)->first();

                        if($findColor && $findSize) {
                            $sku = Sku::create([
                                'sku' => $sku,
                                'price' => $prices[$index++],
                                'product_id' => $product->id,
                                'color_id' => $findColor->id,
                                'size_id' => $findSize->id
                            ]);
                        }
                    }
                }
            }
            $product = $this->_productRepo->update($request, $id);
            $product->load(['category', 'supplier']);

            \DB::commit();
            return $this->jsonData($product);
        } catch (\Exception $ex) {
            \DB::rollBack();
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

    public function getAttribute(Request $request)
    {
        try {
            $colors = Color::all();
            $sizes = Size::all();
            $tags = Tag::all();

            return $this->jsonData([
                'colors' => $colors,
                'sizes' => $sizes,
                'tags' => $tags
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
