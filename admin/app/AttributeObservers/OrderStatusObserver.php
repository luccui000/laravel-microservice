<?php

namespace App\AttributeObservers;

use Luccui\ShareData\Models\Order;

class OrderStatusObserver
{
    /**
     * Handle changes to the "id" field of Order on "created" events.
     *
     * @param \App\Models\Order $order
     * @param mixed $newValue The current value of the field
     * @param mixed $oldValue The previous value of the field
     * @return void
     */
    public function onIdCreated(Order $order, mixed $newValue, mixed $oldValue)
    {
        info($order);
    }

    public function onProvinceIdUpdated(Order $order, mixed $newValue, mixed $oldValue)
    {

    }

    public function onStatusUpdated(Order $order, mixed $newValue, mixed $oldValue)
    {
        info($order);
    }
}
