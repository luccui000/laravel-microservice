<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function like(Request $request, $id)
    {
        $response = Http::withoutVerifying()
            ->get(config('api.admin'). '/api/user/1');

        return $response->body();
    }
}
