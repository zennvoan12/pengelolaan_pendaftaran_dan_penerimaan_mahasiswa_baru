<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $details)
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        $emails = User::pluck('email');
        $emails->all();

        Mail::to($emails)->send(new \App\Mail\EmailNotification($details));

        dd("Email is Sent.");
    }
}