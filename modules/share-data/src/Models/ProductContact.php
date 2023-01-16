<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'phone_number',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
