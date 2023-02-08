<?php

namespace App\Http\Controllers\FE;

use App\Contracts\GiaoHangInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    private $giaohangService;

    public function __construct(
        GiaoHangInterface $giaohangService
    )
    {
        $this->giaohangService = $giaohangService;
    }
    public function getFee(Request $request)
    {
        try {
            $province = $request->get('province');
            $district = $request->get('district');
            $ward = $request->get('ward');


            $fee = $this->giaohangService->phiVanChuyen($ward, $district, $province, 1);

            return $this->jsonData($fee);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
