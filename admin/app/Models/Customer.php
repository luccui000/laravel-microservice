<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address_1',
        'address_2',
        'city',
        'country',
        'email',
        'billing_address',
        'billing_region',
        'billing_postalcode',
        'billing_country',
        'ship_address',
        'ship_region',
        'ship_postalcode',
        'ship_country',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
