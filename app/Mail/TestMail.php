<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;
    public $products;

    /**
     * Create a new message instance.
     */
    public function __construct($bill, $products)
    {
        $this->bill = $bill;
        $this->products = $products;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.thanks')
            ->subject('Cảm ơn bạn đã đặt hàng!')
            ->with([
                'bill' => $this->bill,
                'products' => $this->products,
            ]);
    }
}