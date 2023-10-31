<?php

namespace App\Services;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\{User};
/**
 * Class EmailService
 * @package App\Services
 */
class EmailService
{


public function sendEmailRegister($userId){
    $user = User::find($userId);
    Mail::to($user->email)
    ->send(new SendEmail($user));
}

// public function sendEmailForgetPassword($email){
//     Mail::to($email)
//         ->send(new SendEmail());
// }

// public function sendEmailNewTransaction($email){
//     Mail::to($email)
//         ->send(new SendEmail());
// }
// public function sendEmailAccepterTransaction($email){
//     Mail::to($email)
//         ->send(new SendEmail());
// }

// public function sendEmailValideTransaction($email){
//     Mail::to($email)
//         ->send(new SendEmail());
// }

}
