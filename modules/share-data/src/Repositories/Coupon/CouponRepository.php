<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 21/12/2022
 * Time: 23:30
 * File: CouponRepository.php
 */

namespace Luccui\ShareData\Repositories\Coupon;

use Luccui\ShareData\Models\Coupon;
use Luccui\ShareData\Repositories\EloquentRepository;

class CouponRepository extends EloquentRepository implements CouponInterface
{
    public function model()
    {
        return Coupon::class;
    }

    public function apply($code)
    {
        return $this->model->decrement('is_available', 1);
    }
}