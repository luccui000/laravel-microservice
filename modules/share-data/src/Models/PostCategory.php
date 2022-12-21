<?php

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';

    protected $fillable = [
        'parent_id',
        'name',
        'seo_title',
        'meta_keyword',
        'meta_description',
        'status',
        'sort',
    ];
}
