<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Brand\BrandRepository;

class BrandController extends Controller
{
    private $_brandRepo;

    public function __construct(
        BrandRepository $brandRepository
    ) {
        $this->_brandRepo = $brandRepository;
    }
    public function index()
    {
        try {
            $brands = $this->_brandRepo->all();
            return $this->jsonData($brands);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $brand = $this->_brandRepo->store($request);
            return $this->jsonData($brand);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id)
    {
        try {
            $brand = $this->_brandRepo->find($id);
            return $this->jsonData($brand);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $brand = $this->_brandRepo->update($id, $request);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy($id)
    {
        try {
            $this->_brandRepo->destroy($id);
            return $this->jsonMessage('deleted');
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
