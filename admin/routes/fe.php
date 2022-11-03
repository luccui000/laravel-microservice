<?php

use App\Http\Controllers\FE\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('new', [ProductController::class, 'top10New']);
    Route::get('hot', [ProductController::class, 'top10Hot']);
    Route::get('best-seller', [ProductController::class, 'top10BestSeller']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('{id}/rate', [ProductController::class, 'rate']);
    });
});
