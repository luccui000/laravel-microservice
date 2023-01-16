<?php

namespace Luccui\ShareData\Repositories\Slider;

use Luccui\ShareData\Models\Slider; 
use Luccui\ShareData\Repositories\EloquentRepository;

class SliderRepository extends EloquentRepository implements SliderInterface 
{
  public function model()
  {
    return Slider::class;
  }
}