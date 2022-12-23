<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store(Request $details)
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        $emails = User::pluck('email');
        $emails->all();

        Mail::to($emails)->send(new \App\Mail\PemberitahuanEmail());

        dd("Email is Sent.");
    }
}