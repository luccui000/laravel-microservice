<?php

namespace App\Jobs;

use App\Mail\CustomerCouponMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Mail;

class SendCouponToCustomerEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $customer;
    public $discount;

    public function __construct($customer, $discount)
    {
        $this->customer = $customer;
        $this->discount = $discount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->customer->email)->send(new CustomerCouponMail($this->customer, $this->discount));
    }
}
