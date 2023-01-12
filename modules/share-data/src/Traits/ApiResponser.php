<?php

namespace Luccui\ShareData\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 11/01/2023
 * Time: 21:36
 * File: ApiResponser.php
 */
trait ApiResponser
{
    /**
     * @param array|object $data
     * @param int $status
     * @return JsonResponse
     */
    public function jsonData($data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $status);
    }

    /**
     * @param $data
     * @param int $status
     * @return JsonResponse
     */
    public function jsonTable($data, int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data['data'],
            'count' => $data['total'],
        ], $status);
    }

    /**
     * @param $error
     * @param int $status
     * @return JsonResponse
     */
    public function jsonError($error, int $status = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
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

    /**
     * @param $message
     * @param bool $success
     * @param int $status
     * @return JsonResponse
     */
    public function jsonMessage($message, bool $success = true, int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
        ], $status);
    }
}