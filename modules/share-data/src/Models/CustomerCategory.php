<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCategory extends Model
{
    use HasFactory;

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function children() 
    {
        return $this->hasMany(CustomerCategory::class, 'parent_id', 'id');
    }
}
