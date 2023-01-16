<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller {
    private $_repo;

    public function __construct($repo)
    {

    }
    public function index()
    {
        try {
            $brands = $this->_repo->all();
            return $this->jsonData($brands);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $brand = $this->_repo->store($request);
            return $this->jsonData($brand);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id)
    {
        try {
            $brand = $this->_repo->find($id);
            return $this->jsonData($brand);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $brand = $this->_repo->update($id, $request);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy($id)
    {
        try {
            $this->_repo->destroy($id);
            return $this->jsonMessage('deleted');
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}

