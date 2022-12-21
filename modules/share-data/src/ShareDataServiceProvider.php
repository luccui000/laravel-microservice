<?php

namespace Luccui\ShareData;

use Illuminate\Support\ServiceProvider;
use Luccui\ShareData\Command\PublishMigration;

class ShareDataServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadMigrationsFrom([
            __DIR__ . '../database/migrations'
        ]);
        $this->commands([
            'luccui:publish-db' => PublishMigration::class
        ]);
    }
}