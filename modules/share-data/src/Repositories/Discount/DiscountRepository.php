<?php

namespace Luccui\ShareData\Repositories\Discount;

use Luccui\ShareData\Models\Discount;
use Luccui\ShareData\Repositories\EloquentRepository;

class DiscountRepository extends EloquentRepository implements DiscountInterface
{
  public function model()
  {
    return Discount::class;
  } 
}
