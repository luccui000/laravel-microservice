<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SuccessOrderMail;
use Luccui\ShareData\Models\Order;
use Illuminate\Support\Facades\Mail;
use Luccui\ShareData\Models\Customer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailOrderSuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(!$this->order)
            return;
        $customer = Customer::find($this->order->customer_id);

        Mail::to($customer->email)
            ->send(new SuccessOrderMail($this->order));
    }
}
