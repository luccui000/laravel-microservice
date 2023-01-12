<?php

namespace Luccui\ShareData;

use Illuminate\Support\ServiceProvider;
use Luccui\ShareData\Command\PublishMigration;
use Luccui\ShareData\Models\Order;
use Luccui\ShareData\Observers\OrderObserver;

class ShareDataServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Order::observe(OrderObserver::class);
        $this->loadMigrationsFrom([
            __DIR__ . '../database/migrations'
        ]);
        $this->commands([
            'luccui:publish-db' => PublishMigration::class
        ]);
    }
}