<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FE\CouponController;
use App\Http\Controllers\FE\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::apiResource('user', UserController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('posts', PostController::class);
Route::post('products/{productId}/order', [OrderController::class, 'orderProduct']);
Route::post('/coupon/apply', [CouponController::class, 'applyCoupon']);

Route::group(['prefix' => 'report'], function () {
    Route::get('overview', [ReportController::class, 'overview']);
    Route::get('best-seller', [ReportController::class, 'bestSeller']);
});

