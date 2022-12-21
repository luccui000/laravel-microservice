<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    const DISABLE   = 0;
    const ENABLE    = 1;

    protected $fillable = [
        'name',
        'image',
        'sort',
        'link',
        'status',
    ];
}
