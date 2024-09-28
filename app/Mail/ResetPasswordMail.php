<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('Khôi phục mật khẩu')
                    ->view('emails.reset_password'); // Đảm bảo rằng tên view đúng
    }
    public function envelope()
{
    // Bỏ phương thức này
}

public function content()
{
    // Bỏ phương thức này
}
}
