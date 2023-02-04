<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Model; 
use RecentlyViewed\Models\Contracts\Viewable;
use RecentlyViewed\Models\Traits\CanBeViewed;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements Viewable
{
    use HasFactory, CanBeViewed;

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
        'sell_price', 
        'is_unlimited',
        'category_id',
        'supplier_id',
        'brand_id',
    ];

    protected $appends = [
        'min_price',
        'max_price',
        'image_origin'
    ];

    protected $casts = [
        'has_variant' => 'boolean'
    ];

    public function getImageOriginAttribute()
    {
        return url($this->image);
    }

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
    
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_details');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function sold()
    {
        return $this->hasMany(DetailOrder::class);
    }

    public function details()
    {
        return $this->belongsToMany(Order::class, 'detail_orders');
    }

    public function reviews()
    {
        return $this->hasMany(Rate::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }
    
    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
