<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'fe.'], function () {
    Route::apiResource('orders', OrderController::class);

    Route::group(['prefix' => 'products'], function () {
        Route::post('{id}/rate', [ProductController::class, 'rate']);
    });
});
