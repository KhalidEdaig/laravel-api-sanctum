<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $testEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($testEmail)
    {
        $this->testEmail = $testEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.test.email')->subject($this->testEmail->subject);
    }
}
