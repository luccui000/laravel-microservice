<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function model()
    {
        return Post::class;
    }

}
