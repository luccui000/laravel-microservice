<?php

namespace Luccui\ShareData\Repositories\Product;

use Luccui\ShareData\Models\Product;
use Luccui\ShareData\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function index()
    {
        return $this->model->with(['skus.variants', 'skus.options'])->get();
    }

    public function bestSeller()
    {
        return $this->model
            ->with(['category', 'supplier'])
            ->withCount(['sold'])
            ->orderBy('sold_count', 'desc')
            ->get(2);
    }

    public function getTop10Product()
    {
        return $this->model
            ->with(['category', 'supplier'])
            ->withCount(['sold'])
            ->orderBy('sold_count', 'desc')
            ->take(10)
            ->get();
    }

    public function getTop10Hot()
    {
        return $this->model
            ->with(['category', 'supplier'])
            ->withCount(['sold'])
            ->where('is_hot', 1)
            ->orderBy('sold_count', 'desc')
            ->take(10)
            ->get();
    }

    public function getTop10NewArrived()
    {
        return $this->model
            ->with(['category', 'supplier'])
            ->withCount(['sold'])
            ->where('is_new', 1)
            ->orderBy('sold_count', 'desc')
            ->take(10)
            ->get();
    }

    public function getProducts($request)
    {
        $categories = $request->get('categories');
        $categories = explode(',', $categories);
        $prices = $request->get('prices');
        $prices = explode(',', $prices);
        $colors = $request->get('colors');
        $colors = explode(',', $colors);

        if(isset($prices[0]) && isset($prices[1])) {
            [$minPrice, $maxPrice] = $prices;
        } else {
            $minPrice = 0;
            $maxPrice = $prices;
        }

        $query = $this->model->query();

        if(count($categories) > 0) {
            $query = $query->with([
                'category' => function($query) use ($categories) {
                    $query->whereIn('name', $categories);
                }
            ]);
        }

        if($request->has('prices')) {
            $query = $query->where('price', '>=', $minPrice)
                ->where('price', '<', $maxPrice);
        }

        if($request->has('colors')) {
            $query = $query->whereHas('variants', function($query) use ($colors) {
                $query->where('name', 'Color')
                    ->whereHas('options', function($subQuery) use ($colors) {
                        $subQuery->whereIn('name', $colors);
                    });
            });
        }

        return $query->with(['category', 'supplier', 'variants.options'])
            ->paginate();
    }

    public function newArrival($limit = 5)
    {
        return $this->model->latest()
            ->take($limit)
            ->get();
    }

    public function popularProduct($limit = 5)
    { 
        return $this->model
            ->withCount(['sold'])
            ->orderBy('sold_count', 'DESC')
            ->take($limit)
            ->get();
    }

    public function relatedProduct($request)
    {
        $categoryId = $request->get('category_id');

        return $this->model
            ->where('category_id', $categoryId)
            ->get();
    }
}
