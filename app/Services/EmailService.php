<?php

namespace App\Services;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
/**
 * Class EmailService
 * @package App\Services
 */
class EmailService
{


public function sendEmailRegister($email){
    Mail::to($email)
        ->send(new SendEmail());
}

public function sendEmailForgetPassword($email){
    Mail::to($email)
        ->send(new SendEmail());
}

public function sendEmailNewTransaction($email){
    Mail::to($email)
        ->send(new SendEmail());
}
public function sendEmailAccepterTransaction($email){
    Mail::to($email)
        ->send(new SendEmail());
}

public function sendEmailValideTransaction($email){
    Mail::to($email)
        ->send(new SendEmail());
}

}
