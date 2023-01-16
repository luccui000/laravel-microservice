<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController as CMSBrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FE\BrandController;
use App\Http\Controllers\FE\CouponController;
use App\Http\Controllers\FE\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZaloController;
use Illuminate\Support\Facades\Route;


Route::get('zalo', [ZaloController::class, 'callback']);
Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['as' => 'cms.'], function() {
    Route::apiResource('user', UserController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('brands', CMSBrandController::class);
    Route::apiResource('comments', CommentController::class);

    Route::group(['prefix' => 'report'], function () {
        Route::post('overview', [ReportController::class, 'overview']);
        Route::post('best-seller', [ReportController::class, 'bestSeller']);
    });
});

Route::group(['prefix' => 'fe', 'as' => 'fe.'], function() {
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('posts', PostController::class);

    Route::group(['prefix' => 'coupon'], function() {
        Route::post('apply', [CouponController::class, 'applyCoupon']);
    });

    Route::post('make-order', [OrderController::class, 'store']);
});


Route::group(['prefix' => 'products'], function() {
    Route::post('/{id}/comment', [ProductController::class, 'commentProduct']);
    Route::post('/{id}/order', [OrderController::class, 'orderProduct']);
    Route::post('/{id}/rates', [ProductController::class, 'productRates']);
    Route::post('/{id}/variants', [ProductController::class, 'productVariants']);
});
