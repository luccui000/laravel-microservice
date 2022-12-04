<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function saleInMonth($month = null, $year = null)
    {
        if(!$month) $month = Carbon::now()->month;
        if(!$year) $year = Carbon::now()->year;

        return $this->model
            ->where('status', Order::SUCCESS)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('total');
    }

    public function saleInYear($year = null)
    {
        if(!$year) $year = Carbon::now()->year;

        return $this->model
            ->where('status', Order::SUCCESS)
            ->whereYear('created_at', $year)
            ->sum('total');
    }

    public function revenueInMonth($month = null, $year = null)
    {
        if(!$month) $month = Carbon::now()->month;
        if(!$year) $year = Carbon::now()->year;

        $statement = "SELECT SUM(price * quantity) as total FROM invoice_details";
        $successOrder = $this->model
            ->where('status', Order::SUCCESS)
            ->sum('total');
        $invoices = DB::select($statement)[0];
    }
}
