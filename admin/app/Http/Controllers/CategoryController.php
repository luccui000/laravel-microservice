<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $_categoryRepo;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->_categoryRepo = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        try {
            $categories = $this->_categoryRepo
                ->all()
                ->makeHidden(['created_at', 'updated_at']);

            return $this->jsonData($categories);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
