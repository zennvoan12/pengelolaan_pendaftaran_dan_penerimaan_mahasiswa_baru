<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view ('auth.register');
    }

    protected function create(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $hash = Hash::make($request->password);
        $user->password = $hash;
        $user->save();

        return redirect('/login');
    }
}
