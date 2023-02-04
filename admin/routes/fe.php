<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\FE\CustomerController;
use App\Http\Controllers\FE\HeaderController;
use App\Http\Controllers\FE\PostController;
use App\Http\Controllers\FE\ProductController;
use App\Http\Controllers\FE\SliderController;
use App\Http\Controllers\FE\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('register', [CustomerController::class, 'register']);
Route::post('login', [CustomerController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('me', [CustomerController::class, 'me']);
    Route::post('update-profile', [CustomerController::class, 'updateProfile']);
    Route::post('update-address', [CustomerController::class, 'updateAddress']);
    Route::post('logout', [CustomerController::class, 'logout']);

    Route::post('add-to-cart', [OrderController::class, 'addToCart']);
    Route::post('order', [OrderController::class, 'order']);
    Route::post('get-order', [OrderController::class, 'getOrder']);
});

Route::group(['prefix' => 'address'], function () {
    Route::get('/provinces', [AddressController::class, 'provinces']);
    Route::get('/districts', [AddressController::class, 'districts']);
    Route::get('/wards',     [AddressController::class, 'wards']);
});

Route::group(['prefix' => 'header'], function() {
    Route::get('products', [HeaderController::class, 'products']);
});

Route::group(['prefix' => 'products'], function () {
    Route::post('/', [ProductController::class, 'index']);
    Route::post('new', [ProductController::class, 'top10New']);
    Route::post('hot', [ProductController::class, 'top10Hot']);
    Route::post('best-seller', [ProductController::class, 'top10BestSeller']);
    Route::post('new-arrival', [ProductController::class, 'newArrival']);
    Route::post('ask', [ProductController::class, 'ask']);
    Route::post('popular', [ProductController::class, 'popular']);
    Route::post('related', [ProductController::class, 'related']);

    Route::post('{id}', [ProductController::class, 'show']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('{id}/rate', [ProductController::class, 'rate']);
    });
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostController::class, 'index']);
});

Route::post('sliders', [SliderController::class, 'index']);
