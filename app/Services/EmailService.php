<?php

namespace App\Services;
use App\Mail\{SendEmail,SendEmailForPost,SendEmailNewTransaction};
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
// public function sendEmailAccepterTransaction($email){
//     Mail::to($email)
//         ->send(new SendEmail());
// }

// public function sendEmailValideTransaction($email){
//     Mail::to($email)
//         ->send(new SendEmail());
// }

}
