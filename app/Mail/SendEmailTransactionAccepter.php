<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailTransactionAccepter extends Mailable
{
    use Queueable, SerializesModels;
    public $agencier;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agencier)
    {
        //
        $this->agencier = $agencier;
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
