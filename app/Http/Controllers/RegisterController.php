<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    protected function create(Request $request)
    {

        $validator = $request->validate(
            [
                'email' => 'required|email|unique:users,username,email',
                'password' => 'required|min:8|max:15'
            ],
            [
                'email.unique' => 'emailnya udah ada bang coba cari email',
                'email.required' => 'isi lah bang email nya',
                'password.required' => 'bang isi lah passwordnya.',
                'password.min' => 'minimal 8 bang',
                'password.max' => 'jangan lebih dari 15 bang'
            ]
        );
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $hash = Hash::make($request->password);
        $user->password = $hash;
        $user->save();

        $notification = [
            'message' => 'Anda Berhasil Mendaftar',
            'alert-type' => 'success'
        ];

        return redirect()->route('login')->with($notification);
    }
}
