<?php

namespace App\Http\Controllers\FE;

use App\Contracts\ThanhToanGateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luccui\ShareData\Enums\StatusEnum;
use Luccui\ShareData\Models\Order;

class PaymentController extends Controller
{
    private $paymentGateway;

    public function __construct(
        ThanhToanGateway $paymentGateway
    )
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function generateUrl(Request $request)
    {
        try {
            $customer = $request->user();

            $order = Order::where([
                'customer_id' => $customer->id,
                'status' => StatusEnum::IN_CART
            ])->first();

            if(!$order) {
                return $this->jsonData([]);
            } else {
                $orderNumber = $order->getAttribute('order_number');
                $total = $order->getAttribute('total');

                return $this->jsonData([
                    'url' => $this->paymentGateway->url([
                        'vnp_TxnRef' => $orderNumber,
                        'vnp_OrderInfo' => "Thanh toan hoa don hang hoa, #$orderNumber",
                        'vnp_OrderType' => "billpayment",
                        'vnp_Amount' => $total,
                        'vnp_Locale' => 'vn',
                        'vnp_IpAddr' => $request->ip(),
                    ])
                ]);
            }

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function callback(Request $request)
    {
        try {
            return $this->jsonData($request->all());
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
