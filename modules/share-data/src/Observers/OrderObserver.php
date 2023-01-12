<?php

namespace Luccui\ShareData\Observers;

use Illuminate\Support\Str;
use Luccui\ShareData\Models\Order;

class OrderObserver
{
    public function creating(Order $order)
    {
        $order->order_number = Str::upper(Str::random(10));
    }
}
