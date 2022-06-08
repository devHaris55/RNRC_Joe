<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailToAdmin extends Mailable
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
        if ($check_data == 0) {
            return $this->subject('Conflict request approve')
                ->view('emails.admin-conflict-update', compact('check_data'));
        } else if ($check_data == 1) {
            return $this->subject('Conflict request rejected')
                ->view('emails.admin-conflict-update');
        }
    }
}