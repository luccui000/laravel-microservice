<?php

namespace Luccui\ShareData\Helpers;

use Carbon\Carbon;

/**
 * random element from array
 * @param array $array
 * @return mixed
 */
if(function_exists('array_random')) {
    function array_random($array) {
        return $array[array_rand($array)];
    }
}


if(function_exists('dateNow')) {
    function dateNow() {
        return Carbon::now();
    }
}