<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function prosesForgot(Request $request)
    {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('auth.reset-confirmation', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function passwordReset($token) 
    { 
        return view('auth.reset-password', ['token' => $token]);
    }

    public function newPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([ 
                              'token' => $request->token
                            ])->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $updatePassword->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['token'=> $request->token])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
