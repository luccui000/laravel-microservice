<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'weight',
        'description',
        'long_description',
        'thumb',
        'image',
        'stock',
        'is_hot',
        'is_new',
        'is_unlimited',
        'category_id',
        'supplier_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function sold()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
