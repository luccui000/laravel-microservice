<?php

namespace Luccui\ShareData\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderTracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone',
        'expired_at',
        'is_verified',
        'verify_token'
    ];

    public static function generate($phone)
    {
        $now = Carbon::now();

        return static::create([
            'phone' => $phone,
            'expired_at' => $now->addMinutes(10),
            'is_verified' => 0,
            'verify_token' => mt_rand(100000, 999999)
        ]);
    }
}
