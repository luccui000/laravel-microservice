<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Jobs\ProductRating;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function rate(RateRequest $request, $id)
    {
        try {
            $product = DB::table('products')->find($id);

            if(!$product) {
                return $this->jsonMessage('Product not found');
            }

            $token = $request->bearerToken();
            $response = Http::withToken($token)
                ->withoutVerifying()
                ->get(config('api.admin') . '/api/me');

            if(!$token || $response->status() !== 200) {
                return $this->jsonMessage('Unauthorize', false, Response::HTTP_UNAUTHORIZED);
            }

            $user = $response->json()['data']['user'];

            $data = [
                'product_id'    => $id,
                'user_id'       => $user['id'],
                'vote'          => $request->vote,
                'comment'       => $request->comment
            ];

            ProductRating::dispatch($data)->onQueue('rate_queue');

            return $this->jsonData([
                'success' => true
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
