<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Supplier\SupplierRepository;

class SupplierController extends Controller
{
    private $_supplier;

    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->_supplier = $supplierRepo;
    }

    public function index()
    {
        try {
            $suppliers = $this->_supplier->all();
            return $this->jsonData($suppliers);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id)
    {
        try {
            $supplier = $this->_supplier->find($id);
            return $this->jsonData($supplier);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function update($id, Request  $request)
    {
        try {
            $supplier = $this->_supplier->update($id, $request);
            return $this->jsonData($supplier);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy($id)
    {
        try {
            $this->_supplier->destroy($id);
            return $this->jsonMessage('deleted');
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
