<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareModel\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
