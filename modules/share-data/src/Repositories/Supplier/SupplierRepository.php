<?php

/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 12/01/2023
 * Time: 22:37
 * File: SupplierRepository.php
 */

namespace Luccui\ShareData\Repositories\Supplier;

use Luccui\ShareData\Models\Supplier;
use Luccui\ShareData\Repositories\EloquentRepository;

class SupplierRepository extends EloquentRepository implements SupplierInterface
{
    public function model()
    {
        return Supplier::class;
    }
}