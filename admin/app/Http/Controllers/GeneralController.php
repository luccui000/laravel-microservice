<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller {
    private $_repo;

    protected $_indexRequest;
    protected $_storeRequest;
    protected $_showRequest;
    protected $_updateRequest;
    protected $_destroyRequest;

    public function __construct(
        $repo,
        $indexRequest = null,
        $storeRequest = null,
        $showRequest = null,
        $updateRequest = null,
        $destroyRequest = null
    ) {
        $this->_repo = $repo;
        $this->_indexRequest = $indexRequest;
        $this->_storeRequest = $storeRequest;
        $this->_showRequest = $showRequest;
        $this->_updateRequest = $updateRequest;
        $this->_destroyRequest = $destroyRequest;
    }
    public function index()
    {
        try {
            if($this->_indexRequest)
                app()->make($this->_indexRequest);
            $brands = $this->_repo->all();
            return $this->jsonData($brands);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {
            if($this->_storeRequest)
                app()->make($this->_storeRequest);
            $brand = $this->_repo->store($request);
            return $this->jsonData($brand);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id)
    {
        try {
            if($this->_showRequest)
                app()->make($this->_showRequest);
            $brand = $this->_repo->find($id);
            return $this->jsonData($brand);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            if($this->_updateRequest)
                app()->make($this->_updateRequest);
            $brand = $this->_repo->update($id, $request);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy($id)
    {
        try {
            if($this->_destroyRequest)
                app()->make($this->_destroyRequest);
            $this->_repo->destroy($id);
            return $this->jsonMessage('deleted');
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}

