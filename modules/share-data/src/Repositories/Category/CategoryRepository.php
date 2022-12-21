<?php

namespace Luccui\ShareData\Repositories\Category;

use Luccui\ShareData\Models\Category;
use Luccui\ShareData\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryRepository
{
    public function model()
    {
        return Category::class;
    }
}
