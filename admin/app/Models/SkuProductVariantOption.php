<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkuProductVariantOption extends Model
{
    use HasFactory;

    protected $table = 'sku_product_variant_options';

    protected $fillable = [
        'sku_id',
        'product_variant_id',
        'product_variant_option_id',
    ];
}
