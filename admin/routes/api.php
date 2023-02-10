<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZaloController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FE\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FE\BrandController;
use App\Http\Controllers\FE\CouponController;
use App\Http\Controllers\FE\CategoryController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\BrandController as CMSBrandController;
use App\Http\Controllers\CouponController as CMSCouponController;
use App\Http\Controllers\CategoryController as CMSCategoryController;
use App\Http\Controllers\DiscountController as CMSDiscountController;
use App\Http\Controllers\SupplierController as CMSSupplierController;

Route::post('login', [AuthController::class, 'login']);
Route::get('zalo', [ZaloController::class, 'callback']);
Route::post('me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);

Route::group(['as' => 'cms.'], function() {
    Route::apiResource('user', UserController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CMSCategoryController::class);
    Route::apiResource('brands', CMSBrandController::class);
    Route::apiResource('suppliers', CMSSupplierController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('discounts', CMSDiscountController::class);
    Route::apiResource('coupons', CMSCouponController::class);

    Route::post('get-attribute', [ProductController::class, 'getAttribute']);

    Route::group(['prefix' => 'products'], function() {
        Route::post('get-all', [ProductController::class, 'getAll']);
        Route::post('create', [ProductController::class, 'create']);
    });

    Route::group(['prefix' => 'report'], function () {
        Route::post('overview', [ReportController::class, 'overview']);
        Route::post('best-seller', [ReportController::class, 'bestSeller']);
    });
});

Route::group(['prefix' => 'fe', 'as' => 'fe.'], function() {
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categories', CategoryController::class);

    Route::post('{id}/add-to-cart', [ProductController::class, 'addToCart']);

    Route::post('{id}', [ProductController::class, 'show']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('{id}/rate', [ProductController::class, 'rate']);
    });

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


Route::group(['prefix' => 'dashboard'], function() {
    Route::get('orders', [DashboardController::class, 'orders']);
});
