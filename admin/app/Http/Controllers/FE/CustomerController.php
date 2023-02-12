<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Jobs\SendSMSVerification;
use Luccui\ShareData\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Luccui\ShareData\Models\Customer;
use App\Http\Requests\RegisterRequest;
use Luccui\ShareData\Enums\StatusEnum;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\UpdateProfileRequest;
use Luccui\ShareData\Services\GiaoHangNhanh;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
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
            $password = $request->get('password');

            $request->merge([
                'phone' => preg_replace('/^0/', '+84', $request->get('phone')),
                'is_verified' => 0,
                'verify_token' => mt_rand(100000, 999999),
                'password' => \Hash::make($password)
            ]);

            $customer = $this->_customerRepo->store($request);

            SendSMSVerification::dispatch($customer->toArray());

            return $this->jsonData($request->all());
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function login(Request $request) {
        try {
            $input = $request->get('email');
            $email = $input;
            $phone = preg_replace('/^0/', '+84', $input);

            $customer = $this->_customerRepo
                ->where('email', $email)
                ->orWhere('phone', $phone)
                ->first();


            if(!$customer || !Hash::check($request->password, $customer->password)) {
                return $this->jsonErrorMessage('Email hoặc mật khẩu không đúng');
            }

            return $this->jsonData([
                'token' => $customer->createToken('token')->plainTextToken
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function verify(Request $request)
    {
        try {
            $code = $request->get('code');

            $customer = Customer::where([
                'verify_token' => $code,
                'is_verified' => 0
            ])->first();

            if(!$customer)
                return $this->jsonError('ERROR', Response::HTTP_BAD_REQUEST);

            $customer->is_verified = 1;
            $customer->save();

            return $this->jsonData($customer);
        } catch(\Exception $e) {
            return $this->jsonError($e);
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

    public function updateShipAddress(Request $request)
    {
        try {
            $customer = $request->user();
            $order = Order::where([
                'customer_id' => $customer->id,
                'status' => StatusEnum::IN_CART
            ])->first();

            $province = $request->get('province');
            $district = $request->get('district');
            $ward = $request->get('ward');

            if($order) {
                $order->province_id = $province;
                $order->district_id = $district;
                $order->ward_id = $ward;

                $fee = $order->fee;
                if($order->province_id && $order->district_id && $order->ward_id) {
                    $phi = (new GiaoHangNhanh(config('ghn')))->phiVanChuyen(
                        $order->province_id,
                        $order->district_id,
                        $order->ward_id,
                    );

                    if(isset($phi['total'])) {
                        $fee = $phi['total'];
                    }
                }
                $order->fee = $fee;
                $order->save();

                return $this->jsonData($order);
            }
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
