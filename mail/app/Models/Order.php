<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const DECLINE = 'decline';
    const PENDING = 'pending';
    const SUCCESS = 'success';

    protected $connection = 'admin_db';

    protected $fillable = [
        'order_number',
        'item_count',
        'ship_date',
        'sub_total',
        'discount',
        'total',
        'status',
        'coupon_id',
        'customer_id',
        'shipper_id',
        'payment_type_id',
    ];

}
