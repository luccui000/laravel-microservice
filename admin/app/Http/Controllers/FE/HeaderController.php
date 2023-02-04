<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Luccui\ShareData\Models\Category;

class HeaderController extends Controller
{
    public function home()
    {
        try {
            $homes = [];
            return $this->jsonData($homes);
        } catch(\Exception $e) {
            return $this->jsonData($e);
        }
    }


    public function products()
    {
        try {
            $products = Category::with([
                'products' => function($q) {
                    $q->take(6)->select(['category_id', 'id', 'name']);
                }
            ])->take(4)->get();
            return $this->jsonData($products);
        } catch(\Exception $e) {
            return $this->jsonData($e);
        }
    }

}
