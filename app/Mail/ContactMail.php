<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $subjectCustom;
    public $contentCustom;

    public function __construct($contact, $subject, $content)
    {
        $this->contact = $contact;
        $this->subjectCustom = $subject;
        $this->contentCustom = $content;
    }

    public function build()
    {
        return $this->view('emails.contact')
                    ->subject($this->subjectCustom)
                    ->with([
                        'content' => $this->contentCustom,
                    ]);
    }
}
