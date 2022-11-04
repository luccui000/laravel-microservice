<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\EloquentRepository;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function model()
    {
        return Order::class;
    }
}
