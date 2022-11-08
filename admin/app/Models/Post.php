<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'thumbnail',
        'preview',
        'content',
        'seo_title',
        'meta_keyword',
        'meta_description',
        'post_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
}
