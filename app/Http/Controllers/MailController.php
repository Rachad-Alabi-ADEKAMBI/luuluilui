<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Signup;

class MailController extends Controller
{
    public function sendMail()
    {
        $name = 'bob';
        Mail::to('adekambirachad@gmail.com')->send(new SignUp($name));
        return view('mail');
    }
}
