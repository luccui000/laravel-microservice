<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantOption extends Model
{
    use HasFactory;

    protected $table = 'product_variant_options';

    protected $fillable = [
        'name',
        'product_variant_id',
    ];

    public function skus()
    {
        return $this->belongsToMany(Sku::class);
    }

    public function variants()
    {
        return $this->belongsToMany(ProductVariant::class);
    }
}
