<?php

namespace App\Http\Controllers\CMS;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Order;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function orders()
    {
        try {
            $now = Carbon::now();
            $prevMonth = (clone $now)->subMonth(1);
            $orders = Order::where('created_at', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(created_at) as date'))
                ->get()
                ->groupBy('date');

            $data = [];
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

            return $this->jsonData($data);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
