<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeliveryConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;
    public $products;

    public function __construct($bill, $products)
    {
        $this->bill = $bill;
        $this->products = $products;
    }

    public function build()
    {
        return $this->view('emails.delivery_confirmation')
                    ->subject('Đơn hàng của bạn đã được giao thành công!')
                    ->with([
                        'bill' => $this->bill,
                        'products' => $this->products,
                    ]);
    }
}
