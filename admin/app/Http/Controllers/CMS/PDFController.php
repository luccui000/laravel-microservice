<?php

namespace App\Http\Controllers\CMS;

use PDF;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Order;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    public function export($id, Request $request)
    {
        try {
            $order = Order::with('details')
                ->where('id', $id)
                ->first();

            $pdf = PDF::loadView('pdf.order', [
                'order' => $order
            ]);

            return $pdf->download($this->_makeFilename($order));
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    private function _makeFilename($order)
    {
        return "Order#$order->order_number" . date('Ymdhis') . ".pdf";
    }
}
