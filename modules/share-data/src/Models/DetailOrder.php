<?php

namespace Luccui\ShareData\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetailOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_orders';

    protected $fillable = [
        'product_id',
        'order_id',
        'sku_id',
        'name',
        'price',
        'quantity',
        'total',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->total = $model->price * $model->quantity;
            $order = Order::where(['id' => $model->order_id])->first();
            if($order) {
                $order->updated_at = Carbon::now();
                $order->save();
            }
        });

        static::updating(function ($model) {
            $model->total = $model->price * $model->quantity;
            $order = Order::where(['id' => $model->order_id])->first();
            if($order) {
                $order->updated_at = Carbon::now();
                $order->save();
            }
        });

        static::deleting(function($model) {
            $order = Order::where(['id' => $model->order_id])->first();
            
            if($order) {
                $order->updated_at = Carbon::now();
                $order->save();
            }
        });
    }
}
