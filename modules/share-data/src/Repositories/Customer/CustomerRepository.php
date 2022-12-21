<?php

namespace Luccui\ShareData\Repositories\Customer;


use Luccui\ShareData\Models\Customer;
use Luccui\ShareData\Repositories\EloquentRepository;

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
