<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    protected $connection = 'admin_db';

    protected $fillable = [
        'product_id',
        'order_id',
        'name',
        'price',
        'quantity',
    ];
}
