<?php

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

/**
 * random element from array
 * @param array $array
 * @return mixed
 */
if(!function_exists('array_random')) {
    function array_random($array) {
        return $array[array_rand($array)];
    }
}

if(!function_exists('handleError')) {
    function handleError($error, $status = Response::HTTP_BAD_REQUEST) {
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
            'code' => $status
        ], $status);
    }
}

if(!function_exists('saveImgBase64')) {
    function saveImgBase64($param, $folder): string
    {
        [$extension, $content] = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img_%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk();

        if (!$storage->exists($folder)) {
            $storage->makeDirectory($folder);
        }
        $folder = $folder . '/' . $fileName;
        $storage->put($folder, base64_decode($content), 'public');

        return $storage->url($folder);
    }
}


