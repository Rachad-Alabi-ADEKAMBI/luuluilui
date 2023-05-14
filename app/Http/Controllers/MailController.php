<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\Signup;
use App\Mail\Contact;

class MailController extends Controller
{
    public function sendMail()
    {
        $name = 'bob';
        Mail::to('adekambirachad@gmail.com')->send(new SignUp($name));
        return view('mail');
    }

    public function contactMail()
    {
        $first_name = 'bob';
        $last_name = 'jhak';
        $full_name = $first_name . ' ' . $last_name;
        $subject = 'jhjvkl';
        $email = 'ffsf@dfd.fr';
        $phone_code = 124;
        $phone_number = 255556;
        $message = 'jfhjgrugyoiugjoi ffpgjfogjsj';
        $name = $full_name;
        Mail::to('adekambirachad@gmail.com')->send(new Contact($name));
    }
}