<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {
            $status = $request->get('status', 'success');

            $orders = Order::with(['details', 'customer']);

            if($status != 'all') {
                $orders = $orders->where([
                    'status' => $status
                ]);
            }
            $orders = $orders->paginate();

            return $this->jsonData($orders);
        } catch(\Exception $e) {
            return $this->jsonData($e);
        }
    }
}
