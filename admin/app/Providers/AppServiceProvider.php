<?php

namespace App\Providers;

use App\Contracts\GiaoHangInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\GiaoHangNhanh\GiaoHangNhanh;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GiaoHangInterface::class, function() {
            return new GiaoHangNhanh(config('ghn'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach(glob(app_path() . '/Helpers/*.php') as $helper) {
            require_once($helper);
        }
    }
}
