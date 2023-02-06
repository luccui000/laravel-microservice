<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Luccui\ShareData\Models\Customer;
use Luccui\ShareData\Models\Discount;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Mail\DiscountMail;

class SendEmailDiscountToCustomer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $customer;
    public $discount;

    public function __construct(Discount $discount, Customer $customer)
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
        info("Sending to customer " . $this->customer->email);
        Mail::to($this->customer->email)
            ->send(new DiscountMail($this->discount));
    }
}
