<?php

namespace App\Http\Controllers\FE;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luccui\ShareData\Models\Customer;
use Luccui\ShareData\Models\OrderTracking;
use App\Jobs\DeleteOrderTrackingAfterOneMinute;
use Luccui\ShareData\Models\Order;

class OrderTrackingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $phone = $request->get('phone');
            $phone = preg_replace('/^0/', '+84', $phone);

            $now = Carbon::now();

            $prev = (clone $now)->subMinutes(1);

            $date = Carbon::parse($prev)->toDateString();
            $time = Carbon::parse($prev)->toTimeString();


            $trackings = OrderTracking::where('phone', $phone)
                ->whereDate('expired_at', '=', $date)
                ->whereTime('expired_at', '>=', $time)
                ->get();


                return $this->jsonData($trackings);
            } catch(\Exception $e) {
                return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $phone = $request->get('phone');
            $phone = preg_replace('/^0/', '+84', $phone);

            $tracking = OrderTracking::generate($phone);

            $now = Carbon::now();

            DeleteOrderTrackingAfterOneMinute::dispatch($tracking)
                ->delay($now->addMinutes(1));

            return $this->jsonMessage('Created');
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function verify(Request $request)
    {
        try {
            $code = $request->get('code');

            $now = Carbon::now();

            $prev = (clone $now)->subMinutes(1);

            $date = Carbon::parse($prev)->toDateString();
            $time = Carbon::parse($prev)->toTimeString();

            $trackings = OrderTracking::where('verify_token', $code)
                ->whereDate('expired_at', '=', $date)
                ->whereTime('expired_at', '>=', $time)
                ->first();


            if($trackings) {
                return response()->json([
                    'success' => true,
                    'phone' => $trackings->phone
                ]);
            } else {
                return response()->json([
                    'success' => false
                ]);
            }
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function getOrder(Request $request)
    {
        try {
            $phone = $request->get('phone');
            $phone = preg_replace('/^0/', '+84', $phone);

            $customer = Customer::where('phone', $phone)
                ->first();

            if(1) {
                $orders = Order::with('details')
                    ->where('customer_id', 1)
                    ->get();

                return $this->jsonData($orders);
            }
            return $this->jsonData([]);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
