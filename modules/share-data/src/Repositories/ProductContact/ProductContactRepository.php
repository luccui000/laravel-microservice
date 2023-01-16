<?php

namespace Luccui\ShareData\Repositories\ProductContact;

use Luccui\ShareData\Models\ProductContact;
use Luccui\ShareData\Repositories\EloquentRepository;

class ProductContactRepository extends EloquentRepository implements ProductContactInterface {

  public function model()
  {
    return ProductContact::class;
  }
}
