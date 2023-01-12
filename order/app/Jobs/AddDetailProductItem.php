<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Luccui\ShareData\Models\DetailOrder;
use Luccui\ShareData\Repositories\DetailOrder\DetailOrderRepository;

class AddDetailProductItem implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $item;

    public function __construct($data, $item)
    {
        $this->data = $data;
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $detailRepo = app()->make(DetailOrderRepository::class);

        $detailRepo->makeOrderDetail([
            'order_id' => $this->data['id'],
            'product_id' => $this->item['product_id'],
            'sku_id' => $this->item['sku_id'],
            'quantity' => $this->item['quantity'],
            'name' => $this->item['name'] ?? null,
            'price' => $this->item['price'] ?? null
        ]);
    }
}
