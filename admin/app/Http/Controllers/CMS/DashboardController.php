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

            $orders = Order::where('order_date', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(order_date) as date'))
                ->get()
                ->groupBy('date');

            $orderSuccess = Order::where('order_date', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(order_date) as date'))
                ->where('status', StatusEnum::SUCCESS)
                ->get()
                ->groupBy('date');

            $orderFailed = Order::where('order_date', '>=', $prevMonth)
                ->select('*', \DB::raw('DATE(order_date) as date'))
                ->where('status', StatusEnum::FAILED)
                ->get()
                ->groupBy('date');

            $orders = $this->transformData($orders);
            $orderSuccess = $this->transformData($orderSuccess);
            $orderFailed = $this->transformData($orderFailed);

            $recently = Order::with(['customer'])
                ->whereNotIn('status', [StatusEnum::IN_CART])
                ->latest('order_date')
                ->take(10)->get();

            $orderCount = Order::whereIn('status', [
                StatusEnum::SUCCESS,
                StatusEnum::PENDING,
                StatusEnum::FAILED,
                StatusEnum::CANCELED,
            ])->count();
            
            $orderSuccessCount = Order::where('status', StatusEnum::SUCCESS)->count();
            $orderPendingCount = Order::where('status', StatusEnum::PENDING)->count();
            $orderFailedCount = Order::where('status', StatusEnum::FAILED)->count();
            $orderCancelledCount = Order::where('status', StatusEnum::CANCELED)->count();

            return $this->jsonData([
                'all' => $orders,
                'success' => $orderSuccess,
                'failed' => $orderFailed,
                'recently' => $recently,
                'percent' => [
                    'labels' => [
                        'Thành công',
                        'Đang chờ xác nhận',
                        'Bị hủy',
                        'Lỗi',
                    ],
                    'values' => [
                        ($orderSuccessCount / $orderCount) * 100,
                        ($orderPendingCount / $orderCount) * 100,
                        ($orderCancelledCount / $orderCount) * 100,
                        ($orderFailedCount / $orderCount) * 100,
                    ]
                ]
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
