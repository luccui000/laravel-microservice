<?php

namespace App\Repositories\Invoice;

use App\Models\Invoice;
use App\Repositories\EloquentRepository;

class InvoiceRepository extends EloquentRepository implements InvoiceRepositoryInterface
{
    public function model()
    {
        return Invoice::class;
    }
}
