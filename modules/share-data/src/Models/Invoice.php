<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'status',
        'supplier_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_details')
            ->withPivot(['name', 'quantity', 'price'])
            ->withTimestamps();
    }
}
