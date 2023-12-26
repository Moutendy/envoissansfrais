<?php

namespace App\Services;
use App\Mail\{ReceptionColisReceptionnerTransaction,EmisColisTransaction,SendEmailAccepterForReceptionnerTransaction,ReceptionColisAgentTransaction,SendEmail,SendEmailForPost,SendEmailNewTransaction,SendEmailTransactionAccepter};
use Illuminate\Support\Facades\Mail;
use App\Models\{User};
use Illuminate\Support\Facades\URL;
use App\Services\ContactService;
use Illuminate\Support\Facades\DB;
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
public function sendEmailAccepterTransaction($user_send_id,$user_receiver_id){
    $user_send = User::find($user_send_id);
    $destinataires = [$user_send->email];
    $this->sendEmailAccepterForReceptionnerTransaction($user_receiver_id);
    Mail::to($destinataires)
        ->send(new SendEmailTransactionAccepter($user_send));
}

public function sendEmailAccepterForReceptionnerTransaction($id){

    $user_receiver = User::find($id);
    Mail::to($user_receiver->email)
        ->send(new SendEmailAccepterForReceptionnerTransaction($user_receiver));
}

public function sendEmailReceptionOfColisAgent($receveur_id,$send_id){
    $user_send = User::where('name',$send_id);
    $user_receveur = User::where('name',$receveur_id);

   $destinataires = [$user_send->email,$user_receveur->email_agent];
    Mail::to($destinataires)
        ->send(new ReceptionColisAgentTransaction($destinataires));
}

public function sendEmailEmisOfColisToAgent($agencier_id,$receveur_id){
//$email_agent = DB::select('SELECT email FROM `users` where name=:name',['name'=>$agencier_name]);
    // $email_receveur = DB::select('SELECT email FROM `users` where name=:name',['name'=>$receveur_name]);
     $user_receveur = User::find( $receveur_id);
     $user_agent = User::where('name',$agencier_id);
    // $destinataires = [$email_agent];


   $destinataires = [$user_receveur->email,$user_agent->email_agent];
    Mail::to($destinataires)
        ->send(new EmisColisTransaction($user_receveur));

}


public function sendEmailReceptionOfColis($agencier_id,$send_id){
    $user_agent = User::where('name',$agencier_id);
    $user_send = User::where('name',$send_id);
    
    $destinataires = [$user_agent->email,$user_send->email_agent];
    Mail::to($destinataires)
        ->send(new ReceptionColisReceptionnerTransaction($destinataires));
}
}
