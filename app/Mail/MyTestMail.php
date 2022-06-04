<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appointment)
    {
        $this->details = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $check_data = $this->details->appearance_status;
        if($check_data == 0)
        {
            return $this->subject('Conflict request update')
                     ->view('emails.approved-conflict-request', compact('check_data'));
        } else if($check_data == 1)
        {
            return $this->subject('Conflict request update')
                    ->view('emails.rejected-conflict-request');
        }
        // return $this->view('view.name');
    }
}
