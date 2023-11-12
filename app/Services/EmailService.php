<?php

namespace App\Services;
use App\Mail\{ReceptionColisReceptionnerTransaction,EmisColisTransaction,SendEmailAccepterForReceptionnerTransaction,ReceptionColisAgentTransaction,SendEmail,SendEmailForPost,SendEmailNewTransaction,SendEmailTransactionAccepter};
use Illuminate\Support\Facades\Mail;
use App\Models\{User};
use Illuminate\Support\Facades\URL;
use App\Services\ContactService;
/**
 * Class EmailService
 * @package App\Services
 */
class EmailService
{
 //
 private ContactService $contactService;
 public function __construct(ContactService $contactService)
 {
     $this->contactService = $contactService;
 }

public function sendEmailRegister($userId){
    $user = User::find($userId);
    Mail::to($user->email)
    ->send(new SendEmail($user));
}

public function sendEmailForNewPost(){
    $contacts = $this->contactService->show();
    $url = URL::to('/').'';
    foreach($contacts as $contact)
    {

        Mail::to(auth()->user()->email)
            ->send(new SendEmailForPost($contact,$url));
            sleep(3);
    }

}

public function sendEmailNewTransaction($agencier){
    $url = URL::to('/').'';
    Mail::to($agencier->email)
    ->send(new SendEmailNewTransaction($agencier,auth()->user()->email,$url));
}
public function sendEmailAccepterTransaction($agent){
    $destinataires = ['christophermoutendy@gmail.com', 'moutendy1@gmail.com'];
    Mail::to($destinataires)
        ->send(new SendEmailTransactionAccepter($agent));
}

public function sendEmailAccepterForReceptionnerTransaction($agent){
    $destinataires = ['moutendy1@gmail.com'];
    Mail::to($destinataires)
        ->send(new SendEmailAccepterForReceptionnerTransaction($agent));
}

public function sendEmailReceptionOfColisAgent($agent){
    $destinataires = ['christophermoutendy@gmail.com', 'moutendy1@gmail.com'];
    Mail::to($destinataires)
        ->send(new ReceptionColisAgentTransaction($agent));
}

public function sendEmailEmisOfColisToAgent($agent){
    $destinataires = ['christophermoutendy@gmail.com', 'moutendy1@gmail.com'];
    Mail::to($destinataires)
        ->send(new EmisColisTransaction($agent));
}


public function sendEmailReceptionOfColis($agent){
    $destinataires = ['christophermoutendy@gmail.com', 'moutendy1@gmail.com'];
    Mail::to($destinataires)
        ->send(new ReceptionColisReceptionnerTransaction($agent));
}
}
