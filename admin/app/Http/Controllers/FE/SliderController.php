<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Luccui\ShareData\Repositories\Slider\SliderRepository;

class SliderController extends Controller
{
    private $_sliderRepo;

    public function __construct(
        SliderRepository $sliderRepository
    )
    {
        $this->_sliderRepo = $sliderRepository;
    }

    public function index()
    {
        try {
            $sliders = $this->_sliderRepo->all();

            return $this->jsonData($sliders);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
