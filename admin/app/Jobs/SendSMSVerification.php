<?php

namespace App\Jobs;

use Twilio\Rest\Client;
use Illuminate\Bus\Queueable;
use Luccui\ShareData\Models\Customer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendSMSVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $customer;

    public function __construct(
        Customer $customer
    )
    {
        $this->customer = $customer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sms = config('services.sms');

        $twilio = new Client($sms['sid'], $sms['token']);

        if(!$this->customer->isVerified()) {
            $message = $twilio->messages
                ->create($this->customer->phone, [
                    'body' => "Mã xác nhận của bạn là: " . $this->customer->verify_token,
                    'messagingServiceSid' => $sms['verify_sid']
                ]);
            info($message);
        }

    }
}
