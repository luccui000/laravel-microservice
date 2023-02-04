<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Discount\DiscountRepository;
use Luccui\ShareData\Repositories\CustomerCategory\CustomerCategoryRepository;

class DiscountController extends Controller
{
    private $_discountRepo;
    private $_customerCategoryRepo;

    public function __construct(
        DiscountRepository $discountRepository,
        CustomerCategoryRepository $customerCategoryRepository
    )
    {
        $this->_discountRepo = $discountRepository;
        $this->_customerCategoryRepo = $customerCategoryRepository;
    }

    public function index()
    {
        try {
            // $discounts =  $this->_discountRepo->with('customerCategory')->get();
            $discounts = $this->_customerCategoryRepo
            ->with(['discount', 'children.discount'])
            ->whereNull('parent_id')
            ->get();
            return $this->jsonData($discounts);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show()
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|in:percent,amount',
            'value' => 'required|numeric|min:0|max:1000000',
        ]);

        try {
            \DB::beginTransaction();
            $cusCategory = $this->_customerCategoryRepo
                ->store($request);
            $discount = $this->_discountRepo->store($request);
            \DB::commit();
            return $this->jsonData($discount);
        } catch(\Exception $e) {
            \DB::rollBack();
            return $this->jsonError($e);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'type' => 'required|in:percent,amount',
            'value' => 'required|numeric|min:0|max:1000000',
        ]);
        try {
            $discount = $this->_discountRepo->update($request, $id);
            return $this->jsonData($discount);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy()
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

}
