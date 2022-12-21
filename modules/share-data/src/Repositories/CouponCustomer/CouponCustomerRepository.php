<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 21/12/2022
 * Time: 23:44
 * File: CouponCustomerRepository.php
 */

namespace Luccui\ShareData\Repositories\CouponCustomer;

use Luccui\ShareData\Models\CouponCustomer;
use Luccui\ShareData\Repositories\Coupon\CouponInterface;
use Luccui\ShareData\Repositories\EloquentRepository;

class CouponCustomerRepository extends EloquentRepository implements CouponInterface
{

    public function model()
    {
        return CouponCustomer::class;
    }

    public function customerUsed($customerId, $code)
    {
        return $this->model->where([
            'customer_id' => $customerId,
        ])->whereHas('coupon', function($query) use ($code) {
            return $query->where('code', $code);
        })->exists();
    }
}