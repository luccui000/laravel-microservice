<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $table = 'skus';

    protected $fillable = [
        'sku',
        'price',
        'product_id',
    ];

    public function variants()
    {
        return $this->belongsToMany(ProductVariant::class, 'sku_product_variant_options');
    }

    public function options()
    {
        return $this->belongsToMany(ProductVariantOption::class, 'sku_product_variant_options');
    }
}
