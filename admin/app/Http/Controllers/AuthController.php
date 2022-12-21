<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Luccui\ShareData\Repositories\Customer\CustomerRepository;
use Luccui\ShareData\Repositories\User\UserRepository;


class AuthController extends Controller
{
    private $_customerRepo;
    private $_userRepo;


    public function __construct(
        CustomerRepository $customerRepository,
        UserRepository $userRepository
    ) {
        $this->_customerRepo = $customerRepository;
        $this->_userRepo = $userRepository;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $customer = null;
            DB::transaction(function () use ($request, &$customer) {
                $customer = $this->_customerRepo->store($request);

                $request->request->add([
                    'name' => $request->first_name . ' ' . $request->last_name
                ]);

                $request->merge([
                    'password' => Hash::make($request->password)
                ]);
                $this->_userRepo->store($request);
            });

            return $this->jsonData($customer);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->_userRepo->where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            return $this->jsonData([
                'token' => $user->createToken('token')->plainTextToken
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function me(Request $request)
    {
        try {
            $user = $request->user();
            $user->load('customer');
            return $this->jsonData([
               'user' => $user
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
