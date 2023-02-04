<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_category_id',
        'type',
        'value',
        'status',
    ];

    public function customerCategory()
    {
        return $this->belongsTo(CustomerCategory::class);
    }
}
