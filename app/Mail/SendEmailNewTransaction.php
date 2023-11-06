<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailNewTransaction extends Mailable
{
    use Queueable, SerializesModels;
    public $agencier;
    public $sendUSer;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agencier,$sendUSer,$url)
    {
        //
        $this->agencier = $agencier;
        $this->sendUSer = $sendUSer;
        $this->url = $url;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('christophermoutendy@gmail.com')
        ->subject('Send Email New Transaction')
        ->view('email.sendEmailTransaction');
    }
}
