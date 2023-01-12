<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Luccui\ShareData\Jobs\OrderCreated;

class OrderController extends Controller
{
    private $_httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->_httpClient = $httpClient;
    }

    public function index()
    {
        //
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        try {
            $token = $request->bearerToken();

            $response = $this->_httpClient->withToken($token)
                ->withoutVerifying()
                ->get(config('api.admin') . '/api/me');

            if(!$token || $response->status() !== 200) {
                return $this->jsonMessage('Unauthorized', false, Response::HTTP_UNAUTHORIZED);
            }

            $user = $response->json()['data']['user'];

            $request->request->add([
                'customer_id' => $user['customer']['id']
            ]);

            $data = $request->all();

            OrderCreated::dispatch($data)->onQueue('order_queue');

            return $this->jsonData([
                'message' => 'success'
            ]);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
