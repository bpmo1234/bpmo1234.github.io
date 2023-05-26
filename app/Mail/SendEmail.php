<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_data)
    {
        $this->user_data = $user_data;
 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Subscription Notice')
                    ->from(getcong('site_email'), getcong('site_name'))
                    ->view('emails.subscription_expired');
    }
}
