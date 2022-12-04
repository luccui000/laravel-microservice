<?php

namespace App\Http\Controllers;

use App\Repositories\Invoice\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $_invoiceRepo;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->_invoiceRepo = $invoiceRepository;
    }

    public function index()
    {
        try {
            $invoices = $this->_invoiceRepo->all();
            $invoices->load('products');
            return $this->jsonData($invoices);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
