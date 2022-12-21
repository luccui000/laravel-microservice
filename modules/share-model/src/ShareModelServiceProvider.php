<?php

namespace Luccui\ShareModel;

use Illuminate\Support\ServiceProvider;
use Luccui\ShareModel\Command\FireEvent;

class ShareModelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            'share:model' => FireEvent::class
        ]);
    }

    public function boot()
    {

    }
}