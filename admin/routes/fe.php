<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\FE\PostController;
use App\Http\Controllers\FE\ProductController;
use App\Http\Controllers\FE\SliderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
    Route::get('/provinces', [AddressController::class, 'provinces']);
    Route::get('/districts', [AddressController::class, 'districts']);
    Route::get('/wards',     [AddressController::class, 'wards']);
});

Route::group(['prefix' => 'products'], function () {
    Route::post('/', [ProductController::class, 'index']);
    Route::post('new', [ProductController::class, 'top10New']);
    Route::post('hot', [ProductController::class, 'top10Hot']);
    Route::post('best-seller', [ProductController::class, 'top10BestSeller']);
    Route::post('new-arrival', [ProductController::class, 'newArrival']);
    Route::post('ask', [ProductController::class, 'ask']);

    Route::post('{id}/add-to-cart', [ProductController::class, 'addToCart']);

    Route::post('{id}', [ProductController::class, 'show']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('{id}/rate', [ProductController::class, 'rate']);
    });
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostController::class, 'index']);
});

Route::post('sliders', [SliderController::class, 'index']);
