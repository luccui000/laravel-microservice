<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonData($data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $status);
    }

    public function jsonTable($data, int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data['data'],
            'count' => $data['total'],
        ], $status);
    }

    public function jsonError($error, int $status = Response::HTTP_INTERNAL_SERVER_ERROR): \Illuminate\Http\JsonResponse
    {
        $message = $error;
        $file = '';
        $line = '';

        if (is_object($error)) {
            $message = $error->getMessage();
            $file = env('APP_ENV') === 'production' ? '' : $error->getFile();
            $line = env('APP_ENV') === 'production' ? '' : $error->getLine();
        }

        return response()->json([
            'success' => false,
            'message' => $message,
            'file' => $file,
            'line' => $line,
        ], $status);
    }

    public function jsonMessage($message, bool $success = true, int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
        ], $status);
    }

}
