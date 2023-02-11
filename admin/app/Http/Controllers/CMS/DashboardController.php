<?php

namespace App\Http\Controllers\CMS;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Order;
use App\Http\Controllers\Controller;
use Luccui\ShareData\Enums\StatusEnum;

class DashboardController extends Controller
{
    public function orders(Request $request)
    {
        try {
            $now = Carbon::now();
            $prevMonth = (clone $now)->subMonth(1);

            $orders = Order::where('created_at', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(created_at) as date'))
                ->get()
                ->groupBy('date');

            $orderSuccess = Order::where('created_at', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(created_at) as date'))
                ->where('status', StatusEnum::SUCCESS)
                ->get()
                ->groupBy('date');

            $orderFailed = Order::where('created_at', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(created_at) as date'))
                ->where('status', StatusEnum::FAILED)
                ->get()
                ->groupBy('date');

            $orders = $this->transformData($orders);
            $orderSuccess = $this->transformData($orderSuccess);
            $orderFailed = $this->transformData($orderFailed);

            return $this->jsonData([
                'all' => $orders,
                'success' => $orderSuccess,
                'failed' => $orderFailed
            ]);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function transformData($orders)
    {
        $data = [];
        $now = Carbon::now();

        $prev = (clone $now)->subMonth(1);

        for($current = $now; $current->gt($prev); $current = $current->subDay(1)) {
            $currentDate = $current->format('Y-m-d');
            $flag = 0;
            foreach($orders as $key => $order) {
                if($key == $currentDate) {
                    $flag = 1;
                    $data[$currentDate] = $order->sum('total');
                }
            }
            if($flag == 0) {
                $data[$currentDate] = 0;
            }
        }
        return $data;
    }
}
