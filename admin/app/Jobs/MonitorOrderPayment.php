<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Luccui\ShareData\Models\Order;

class MonitorOrderPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tries = 5;
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
        if($this->order->isSuccess())
            return ;

        $minute = config('constants.minutes_decline_transaction');

        if($this->order->order_date->diffInMinutes() > $minute + 1) {
            $this->order->markFailed();
            return ;
        }

        // handle send email into user here


        $this->release(now()->addMinutes(ceil($minute / $this->tries)));
    }
}
