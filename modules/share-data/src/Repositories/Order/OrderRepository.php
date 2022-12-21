<?php

namespace Luccui\ShareData\Repositories\Order;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Luccui\ShareData\Models\Order;
use Luccui\ShareData\Repositories\EloquentRepository;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function model()
    {
        return Order::class;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function orderInPreviouseDay()
    {
        return $this->model
            ->where('status', Order::SUCCESS)
            ->where('created_at', '>=', now()->subDay(7))
            ->take(7)
            ->get();
    }

    public function completed()
    {
        return $this->model->where('status', Order::SUCCESS)->get();
    }

    public function unfinished()
    {
        return $this->model->where('status', Order::PENDING)->get();
    }

    public function saleIn30Day()
    {
        return $this->model
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total) as revenue'))
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get();
    }
}
