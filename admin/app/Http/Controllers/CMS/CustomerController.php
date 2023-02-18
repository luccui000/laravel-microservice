<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 20);

            $customers = Customer::with('category')
                ->paginate($perPage);

            return $this->jsonData($customers);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id, Request $request)
    {
        try {
            $customer = Customer::find($id);
            return $this->jsonData($customer);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $customer = Customer::create($request->all());

            return $this->jsonData($customer);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $customer = Customer::find($id);

            $customer->update($request->all());

            return $this->jsonData($customer);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy(Request $request)
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
