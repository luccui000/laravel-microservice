<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailJobs extends Model
{
    use HasFactory;

    protected $connection = 'rate_db';
}
