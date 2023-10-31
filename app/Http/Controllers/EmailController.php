<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailService;
use App\Models\{User};
class EmailController extends Controller
{
    //
   private EmailService $serviceEmail;

    public function __construct(EmailService $serviceEmail)
    {
        $this->serviceEmail = $serviceEmail;
    }

    public function sendEmailRegister($userId){

        $this->serviceEmail->sendEmailRegister($userId);
    }
}
