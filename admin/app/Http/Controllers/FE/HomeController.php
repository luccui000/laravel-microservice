<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luccui\ShareData\Models\Product;
use Luccui\ShareData\Models\DetailOrder;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $bestsellers = DetailOrder::with('product')
                ->groupBy('product_id')
                ->select([
                    '*',
                    \DB::raw('COUNT(product_id) as count_pro')
                ])
                ->orderBy('count_pro', 'DESC')
                ->take(8)
                ->get();

            $newests = Product::latest()
                ->take(8)
                ->get();

            $bestsellers = $bestsellers->map(function($item) {
                return $item->product;
            });

            return $this->jsonData([
                'bestseller' => $bestsellers,
                'newest' => $newests
            ]);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
