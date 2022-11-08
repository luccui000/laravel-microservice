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
        'brand_id',
    ];

    public $appends = [
        'min_price',
        'max_price'
    ];

    public function getMinPriceAttribute()
    {
        return $this->skus->min('price');
    }

    public function getMaxPriceAttribute()
    {
        return $this->skus->max('price');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
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
