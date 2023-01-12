<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    const DECLINE = 'decline';
    const PENDING = 'pending';
    const SUCCESS = 'success';

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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'detail_orders', 'order_id', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function details()
    {
        return $this->belongsToMany(Product::class, 'detail_orders');
    }

    public static function generateNewOrderNumber()
    {
        $orderNumber = static::_makeOrderNumber();
        while((new static)->where('order_number')->exists()) {
            $orderNumber = static::_makeOrderNumber();
        }
        return $orderNumber;
    }

    private static function _makeOrderNumber(): string
    {
        return Str::upper(Str::random(10));
    }

    public function isSuccess()
    {
        return $this->status == self::SUCCESS;
    }

    public function markDeclined()
    {
        $this->status = self::DECLINE;
        $this->save();
    }
}
