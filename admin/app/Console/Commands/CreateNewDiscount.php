<?php

namespace App\Console\Commands;

use App\Jobs\SendCouponToCustomerEmail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Luccui\ShareData\Models\Customer;
use Luccui\ShareData\Models\Discount;

class CreateNewDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discount:create';

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
        $discounts = Discount::whereDate('active_date', Carbon::now())->get();
        $customers = Customer::all();

        foreach($discounts as $discount) {
            $cusCategories = $customers->where('customer_category_id', $discount->customer_category_id);

            foreach($cusCategories as $customer) {
                SendCouponToCustomerEmail::dispatch($customer, $discount)->onQueue('mail_queue');
            }
        }
    }
}
