<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Luccui\ShareData\Models\Discount;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscountMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $_discount;

    public function __construct(Discount $discount)
    {
        $this->_discount = $discount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template = 'emails.discount';

        if($this->_discount->type == 'percent') {
            $template = 'emails.percent';
        }

        $this->_discount->is_sent = 1;
        $this->_discount->save();

        return $this->markdown($template)
            ->with([
                'discount' => $this->_discount
            ]);
    }
}
