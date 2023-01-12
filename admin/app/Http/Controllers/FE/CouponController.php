<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Coupon\CouponRepository;
use Luccui\ShareData\Repositories\CouponCustomer\CouponCustomerRepository;

class CouponController extends Controller
{
    private $_couponRepo;
    private $_couponCustomerRepo;

    public function __construct(
        CouponRepository $couponRepository,
        CouponCustomerRepository $couponCustomerRepository
    )
    {
        $this->_couponRepo = $couponRepository;
        $this->_couponCustomerRepo = $couponCustomerRepository;
    }

    public function applyCoupon(Request $request)
    {
        try {
            $usedCoupon = $this->_couponCustomerRepo->customerUsed(null, $request->get('code'));
        } catch (\Exception $e) {
            return $this->jsonError($e->getMessage());
        }
    }
}
