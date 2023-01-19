<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\GeneralController;
use Luccui\ShareData\Repositories\Category\CategoryRepository;

class CategoryController extends GeneralController
{
    public function __construct(CategoryRepository $categoryRepo)
    {
        parent::__construct($categoryRepo);
    }
}
