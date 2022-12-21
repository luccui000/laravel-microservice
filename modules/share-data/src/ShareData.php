<?php

namespace Luccui\ShareModel;

use Illuminate\Support\Facades\Facade;

class ShareData extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'share-data';
    }
}