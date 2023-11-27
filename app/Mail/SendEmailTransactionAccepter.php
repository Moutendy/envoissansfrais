<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailTransactionAccepter extends Mailable
{
    use Queueable, SerializesModels;
    public $user_send;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_send)
    {
        //
        $this->user_send = $user_send;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('christophermoutendy@gmail.com')
        ->subject('Acception Transition')
        ->view('email.acceptionTransition');
    }
}
