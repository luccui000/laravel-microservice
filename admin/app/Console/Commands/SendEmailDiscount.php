<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Luccui\ShareData\Models\Customer;
use Luccui\ShareData\Models\Discount;
use App\Jobs\SendEmailDiscountToCustomer;

class SendEmailDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:discount';

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
        $now = Carbon::now();

        $discounts = Discount::whereDate('active_date', $now)
            ->with('customers')
            ->get();

        foreach($discounts as $discount) {
            $customers = $discount->customers;
            foreach($customers as $customer) {
                SendEmailDiscountToCustomer::dispatch($discount, $customer)->onQueue('mail_queue');
            }
        }
    }
}
