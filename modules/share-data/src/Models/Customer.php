<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'phone',
        'email',
        'password',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'city',
        'country',
        'billing_address',
        'billing_region',
        'billing_postalcode',
        'billing_country',
        'ship_address',
        'ship_region',
        'ship_postalcode',
        'ship_country',
        'verify_token',
        'is_verify'
    ];

    protected $appends = ['name'];

    protected $hidden = ['password'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getNameAttribute()
    {
        return $this->attributes['first_name'] . " " . $this->attributes['last_name'];
    }

    public function isVerified()
    {
        return $this->is_verify == 1;
    }
}
