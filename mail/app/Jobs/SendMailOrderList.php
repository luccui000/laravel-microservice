<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailOrderList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $order;

    public function __construct($data)
    {
        $this->order = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        var_dump('Sending email to user' . $this->order['customer']['email']);
        $customer = $this->order['customer'];

        Mail::to($customer['email'])->send(new \App\Mail\OrderCreated($this->order));
    }
}
