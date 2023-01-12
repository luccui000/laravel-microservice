<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Luccui\ShareData\Repositories\DetailOrder\DetailOrderRepository;
use Luccui\ShareData\Repositories\Order\OrderRepository;
use Luccui\ShareData\Repositories\Product\ProductRepository;
use Luccui\ShareData\Repositories\Sku\SkuRepository;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private $_orderRepo;
    private $_detailOrderRepo;
    private $_productRepo;
    private $_skuRepo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;

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

    }
}
