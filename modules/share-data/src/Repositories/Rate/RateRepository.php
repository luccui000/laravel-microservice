<?php

namespace Luccui\ShareData\Repositories\Rate;


use Luccui\ShareData\Models\Rate;
use Luccui\ShareData\Repositories\EloquentRepository;

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
