<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponStoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Coupon;

use function Luccui\ShareData\Helpers\dateNow;

class CouponController extends Controller {

    public function __construct()
    {

    }


    public function index()
    {
        try {
            $coupons = Coupon::all();
            return $this->jsonData($coupons);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(CouponStoreRequest $request)
    {
        try {
            $discountAfter = $request->get('discount_after');
            $discountAfter = $request->get('discount_after');
            $discountExpired = $request->get('discount_expired');

            $now = Carbon::now();
            $from = Carbon::now();

            if($discountExpired != 1) {
                $from = new Carbon($request->get('from'));
            }

            if($discountAfter == 1) {
                $to = $now->addDay(1);
            } else if ($discountAfter == 2) {
                $to = $now->addWeek(1);
            } else if ($discountAfter == 3) {
                $to = $now->addMonth(1);
            } else if ($discountAfter == 4) {
                $to = new Carbon($request->get('to'));
            } else {
                $to = $now;
            }

            $coupon = Coupon::create([
                'name' => $request->get('name'),
                'code' => $request->get('code'),
                'from' => $from,
                'to' => $to,
                'desc_by' => $request->get('discount_type'),
                'value' => $request->get('discount_value'),
                'status' => $request->get('status'),
            ]);
            return $this->jsonData($coupon);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function update()
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function delete()
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
