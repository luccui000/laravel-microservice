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
}
