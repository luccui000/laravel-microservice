<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Brand\BrandRepository;

class BrandController extends Controller
{
    private $_branchRepo;

    public function __construct(
        BrandRepository $brandRepository
    )
    {
        $this->_branchRepo = $brandRepository;
    }

    public function index()
    {
        try {
            $brands = $this->_branchRepo->all();
            return $this->jsonData($brands);
        } catch (\Exception $e) {
            return $this->jsonError($e->getMessage());
        }
    }
}
