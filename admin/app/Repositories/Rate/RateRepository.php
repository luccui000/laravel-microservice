<?php

namespace App\Repositories\Rate;

use App\Models\Rate;
use App\Repositories\EloquentRepository;

class RateRepository extends EloquentRepository implements RateRepositoryInterface
{
    public function model()
    {
        return Rate::class;
    }

    public function create(array $rate)
    {
        return $this->model->create($rate);
    }
}
