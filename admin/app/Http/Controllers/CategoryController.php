<?php

namespace App\Http\Controllers;

use Luccui\ShareData\Repositories\Category\CategoryRepository;
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
        try {
            $category = $this->_categoryRepo->store($request);
            return $this->jsonData($category);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $category = $this->_categoryRepo->find($id);

            return $this->jsonData($category);
        }  catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = $this->_categoryRepo->update($id, $request);
            return $this->jsonData($category);
        }  catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->_categoryRepo->destroy($id);
            return $this->jsonMessage('deleted');
        }  catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
