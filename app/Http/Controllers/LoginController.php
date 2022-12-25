<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{



    public function login()
    {
        return view('auth.login');
    }

    // public function authenticate(Request $request)
    // {
    //     $notification1 = [
    //         'message' => 'Anda Berhasil Login',
    //         'alert-type' => 'success'
    //     ];
    //     $notification2 = [
    //         'message' => 'Mungkin Terjadi Kesalahan Coba Cek Kembali',
    //         'alert-type' => 'error'
    //     ];
    //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password]) || Auth::attempt(['email' => $request->username, 'password' => $request->password])) {

    //         $request->session()->regenerate();
    //         return redirect()->intended('dashboard')->with($notification1);
    //     }
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //         'password' => 'Password Salah'
    //     ])->with($notification2);
    // }
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]) || Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            // Notifikasi login berhasil
            // session()->flash('notification', [
            //     'message' => 'Anda Berhasil Login',
            //     'alert-type' => 'success'
            // ]);
            $notification1 = [
                'message' => 'Anda Berhasil Login',
                'alert-type' => 'success'
            ];
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with($notification1);
        }

        // Notifikasi login gagal
        session()->flash('notification', [
            'message' => 'Mungkin Terjadi Kesalahan Coba Cek Kembali',
            'alert-type' => 'error'
        ]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Password Salah'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}