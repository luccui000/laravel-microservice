<?php

namespace Luccui\ShareData\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Luccui\ShareData\Enums\DiscountTypeEnum; 
use Luccui\ShareData\Services\GiaoHangNhanh;

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


    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }
    
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
        return $this->hasMany(DetailOrder::class);
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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) { 
            $detailOrder = DetailOrder::where([
                'order_id' => $model->id
            ])->get();

            $subTotal = 0;
            foreach($detailOrder as $item) {
                $subTotal += $item->total;
            }
            

            $now = Carbon::now();

            $coupon = Coupon::where([
                'id' => $model->coupon_id
            ])->whereDate('from', '<=', $now)
                ->whereDate('to', '>=', $now)
                ->first();

            $couponAmount = 0;
            
            if($coupon) {
                if($coupon->desc_by  == DiscountTypeEnum::PERCENT) {
                    $percent = $coupon->value;
                    $couponAmount = $subTotal * ($percent / 100);
                } else {
                    $value = $coupon->value;
                    $couponAmount = $subTotal - $value;
                }
            }

            $customer = Customer::find($model->customer_id);

            $discount = Discount::find($customer->customer_category_id);
            $amount = 0;

            if($discount) {
                if($discount->type  == DiscountTypeEnum::PERCENT) {
                    $percent = $discount->value;
                    $amount = $subTotal * ($percent / 100);
                } else {
                    $value = $discount->value;
                    $amount = $subTotal - $value;
                }
            } 

            $totalDiscount = $amount + $couponAmount; 

            $model->sub_total = $subTotal;
            $model->discount = $totalDiscount; 

            $model->total = ($subTotal - $totalDiscount) + $model->fee;
        });

        static::updating(function ($model) { 
            $detailOrder = DetailOrder::where([
                'order_id' => $model->id
            ])->get();

            $subTotal = 0;
            foreach($detailOrder as $item) {
                $subTotal += $item->total;
            }
            

            $now = Carbon::now();

            $coupon = Coupon::where([
                'id' => $model->coupon_id
            ])->whereDate('from', '<=', $now)
                ->whereDate('to', '>=', $now)
                ->first();

            $couponAmount = 0;
            
            if($coupon) {
                if($coupon->desc_by  == DiscountTypeEnum::PERCENT) {
                    $percent = $coupon->value;
                    $couponAmount = $subTotal * ($percent / 100);
                } else {
                    $value = $coupon->value;
                    $couponAmount = $subTotal - $value;
                }
            }

            $customer = Customer::find($model->customer_id);

            $discount = Discount::find($customer->customer_category_id);
            $amount = 0;

            if($discount) {
                if($discount->type  == DiscountTypeEnum::PERCENT) {
                    $percent = $discount->value;
                    $amount = $subTotal * ($percent / 100);
                } else {
                    $value = $discount->value;
                    $amount = $subTotal - $value;
                }
            } 

            $totalDiscount = $amount + $couponAmount; 

            $model->sub_total = $subTotal;
            $model->discount = $totalDiscount; 

            $model->total = ($subTotal - $totalDiscount) + $model->fee;
        });
    } 
}
