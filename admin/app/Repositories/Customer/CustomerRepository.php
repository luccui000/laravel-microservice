<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    public function model()
    {
        return Customer::class;
    }

    public function count()
    {
        return $this->model->count();
    }

    public function customerIn7PreviousDay()
    {
        return $this->model->where('created_at', '>=', now()->subDay(7))->latest()->take(7)->get();
    }
}
