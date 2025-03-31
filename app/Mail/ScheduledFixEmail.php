<?php

namespace App\Mail;

use App\Models\BookFix;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScheduledFixEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $bookFix;

    /**
     * Create a new message instance.
     *
     * @param  BookFix  $bookFix
     * @return void
     */
    public function __construct(BookFix $bookFix)
    {
        $this->bookFix = $bookFix;
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Lịch Sửa Chữa Đã Được Lên Lịch')
                    ->view('emails.scheduled_fix') // Tạo view email ở thư mục resources/views/emails
                    ->with([
                        'name' => $this->bookFix->name,
                        'fix_date' => $this->bookFix->fix_date,
                    ]);
    }
}

