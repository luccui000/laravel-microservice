<?php

namespace App\Console\Commands;

use App\Jobs\ProcessCouponCreated;
use Illuminate\Console\Command;

class CreateCoupon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupon:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ProcessCouponCreated::dispatch([
            'coupon_id' => 12134,
            'coupon_expired' => now()
        ])->onQueue('coupon_queue');
    }
}
