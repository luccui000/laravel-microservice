<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class OrderCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;

        DB::transaction(function () use (&$data) {
            $items = $data['items'];
            $data['order_number'] = Order::generateNewOrderNumber();
            $data['item_count'] = count($data['items']);
            $order = Order::create($data);

            $subTotal = 0;
            $itemCount = 0;
            foreach ($items as $item) {
                $product = Product::find($item['product_id']);

                $order->products()->attach($product->id, [
                    'product_id'    => $product->id,
                    'order_id'      => $order->id,
                    'name'          => $product->name,
                    'price'         => $product->price,
                    'quantity'      => $item['quantity'],
                    'total'         => $product->price * $item['quantity'],
                ]);

                $itemCount  += $item['quantity'];
                $subTotal   += $product->price * $item['quantity'];
            }

            $order->item_count  = $itemCount;
            $order->sub_total   = $subTotal;
            $order->total       = $subTotal - $data['discount'];
            $order->save();
            $order->load(['products', 'customer']);

            $orderList = $order->toArray();

            SendMailOrderList::dispatch($orderList)->onQueue('mail_queue');
        });

        logger('Customer #' . $this->data['customer_id'] . ' ordered');
    }
}
