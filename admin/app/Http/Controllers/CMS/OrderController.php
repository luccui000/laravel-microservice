<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailOrderCancelled;
use App\Jobs\SendMailOrderConfirmed;
use Illuminate\Http\Request;
use Luccui\ShareData\Enums\StatusEnum;
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
            $orders = $orders
                ->latest('order_date')
                ->paginate();

            return $this->jsonData($orders);
        } catch(\Exception $e) {
            return $this->jsonData($e);
        }
    }

    public function confirm($id, Request $request) {
        try {
            $order = Order::with(['customer'])->find($id);

            $order->status = StatusEnum::SUCCESS;
            $order->save();

            SendMailOrderConfirmed::dispatch($order->toArray())->onQueue('mail_queue');

            return $this->jsonData($order);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function cancel($id)
    {
        try {
            $order = Order::with(['customer'])->find($id);

            $order->status = StatusEnum::CANCELED;
            $order->save();

            SendMailOrderCancelled::dispatch($order->toArray())->onQueue('mail_queue');

            return $this->jsonData($order);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
