<?php

namespace App\Jobs;

use App\Mail\ConfirmOrderMail;
use Illuminate\Bus\Queueable;
use Luccui\ShareData\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ConfirmOrder implements ShouldQueue
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
        $orderEmails = config('constants.email.order');

        foreach($orderEmails as $email) {
            info("Sending to " . $email);
            Mail::to($email)
                ->send(new ConfirmOrderMail($this->order));
        }
    }
}
