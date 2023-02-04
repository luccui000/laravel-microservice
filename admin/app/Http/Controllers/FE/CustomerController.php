<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Luccui\ShareData\Repositories\Customer\CustomerRepository;

class CustomerController extends Controller
{
    private $_customerRepo;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->_customerRepo = $customerRepository;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $customer = $this->_customerRepo->store($request);
            return $this->jsonData($customer);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function login(Request $request) {
        try {
            $customer = $this->_customerRepo->where('email', $request->email)->first();

            if(!$customer || !Hash::check($request->password, $customer->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            return $this->jsonData([
                'token' => $customer->createToken('token')->plainTextToken
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function me(Request $request)
    {
        try {
            $customer = $request->user();
            return $this->jsonData($customer);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            $customer = $request->user();
            $customer->first_name   = $request->get('first_name');
            $customer->last_name    = $request->get('last_name');
            $customer->email        = $request->get('email');
            $customer->phone        = $request->get('phone');
            $customer->save();
            return $this->jsonData($customer);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function updateAddress(UpdateAddressRequest $request)
    {
        try {
            $customer = $request->user();
            $customer->city = $request->get('city');
            $customer->country = $request->get('country');
            $customer->address_1 = $request->get('address_1');
            $customer->address_2 = $request->get('address_2');
            $customer->ship_address = $request->get('address_1');
            $customer->save();

            return $this->jsonData($customer);
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return $this->jsonMessage('Logout');
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
