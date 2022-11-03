<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {
    Route::post('{id}/rate', [ProductController::class, 'rate']);
});
