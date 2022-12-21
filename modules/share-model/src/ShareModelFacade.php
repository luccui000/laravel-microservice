<?php

namespace Luccui\ShareModel;

use Illuminate\Support\Facades\Facade;

class ShareModelFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'share-model';
    }
}