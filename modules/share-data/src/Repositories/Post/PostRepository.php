<?php

namespace Luccui\ShareData\Repositories\Post;


use Luccui\ShareData\Models\Post;
use Luccui\ShareData\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function model()
    {
        return Post::class;
    }

    public function getAllPost($perPage = 10)
    {
        return $this->model
            ->select([
                'id',
                'title',
                'thumbnail',
                'preview',
                'seo_title',
                'meta_keyword',
                'meta_description',
                'post_category_id'
            ])
            ->with(['category'])
            ->paginate($perPage);
    }
}
