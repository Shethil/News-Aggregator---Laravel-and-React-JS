<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\TestMail;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){

        $details = [
        'title' => 'Mail from News Aggregrator',
        'body' => 'This is for testing mail using Gmail.'
        ];
        
        

        Mail::to("shithelahammed@gmail.com")-> send(new TestMail($details));
        return "Email Sent";
    }   
}
