<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    private $_httpClient;

    public function __construct()
    {
        $this->_httpClient = Http::baseUrl(config('ghn.base_api'));
    }

    public function provinces(): JsonResponse
    {
        try {
            $provinces = Cache::rememberForever('provinces', function() {
                $response = $this->_httpClient->withHeaders([
                        'Content-Type' => 'application/json',
                        'Token' => config('ghn.shop_token')
                    ])->get('/shiip/public-api/master-data/province');

                if($response->status() !== 200) {
                    Cache::forget('provinces');
                    return [];
                }

                $provinces = collect($response->json()['data'])->map(function($item) {
                    return [
                        'id'    => $item['ProvinceID'],
                        'name' => $item['ProvinceName'],
                    ];
                });

                return $provinces->toArray();
            });
            return $this->jsonData($provinces);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function districts(Request $request): JsonResponse
    {
        try {
            $province_id = $request->get('province_id');

            $districts = Cache::rememberForever("districts.$province_id", function() use ($province_id) {
                $response = $this->_httpClient->withHeaders([
                    'Content-Type' => 'application/json',
                    'Token' => config('ghn.shop_token')
                ])->get("/shiip/public-api/master-data/district?province_id=$province_id");

                if($response->status() !== 200) {
                    Cache::forget("districts.$province_id");
                    return [];
                }

                $districts = collect($response->json()['data'])->map(function($item) {
                    return [
                        'id'    => $item['DistrictID'],
                        'name'  => $item['DistrictName'],
                    ];
                });

                return $districts->toArray();
            });

            return $this->jsonData($districts);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function wards(Request $request): JsonResponse
    {
        try {
            $district_id = $request->get('district_id');

            $wards = Cache::rememberForever("wards.$district_id", function() use ($district_id) {
                $response = $this->_httpClient->withHeaders([
                    'Content-Type' => 'application/json',
                    'Token' => config('ghn.shop_token')
                ])->get("/shiip/public-api/master-data/ward?district_id=$district_id");

                if($response->status() !== 200) {
                    Cache::forget("wards.$district_id");
                    return [];
                }

                $wards = collect($response->json()['data'])->map(function($item) {
                    return [
                        'id'    => $item['WardCode'],
                        'name'  => $item['WardName'],
                    ];
                });

                return $wards->toArray();
            });

            return $this->jsonData($wards);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
