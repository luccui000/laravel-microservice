<?php

namespace App\Jobs;

use App\Models\Rate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ProductRating implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data  = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $rate = Rate::where([
                'product_id' => $this->data['product_id'],
                'user_id'   => $this->data['user_id'],
            ])->first();

            if($rate->exists()) {
                $rate->vote     = $this->data['vote'];
                $rate->comment  = $this->data['comment'];
                $rate->save();
            } else {
                $rate = Rate::create($this->data);
            }
            logger('Rating #' . $rate->vote);
        } catch (\Exception $exception) {
            logger($exception->getMessage());
        }
    }
}
