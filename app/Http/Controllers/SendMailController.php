<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    //

    public function index (Request $req){
        //dd($req);

        $req -> validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required']);

        $details = [
            'title' => 'Profile Contact Us Info',
            'name' => $req['name'], 
            'email' => $req['email'], 
            'subject' => $req['subject'], 
            'message' =>$req['message'] 
        ];


        //return 'hello i m controller';

        Mail::to('neetesh652@gmail.com')->send(new SendMail($details));
        return 'Thank You , Your Email is sent';
    }
}
