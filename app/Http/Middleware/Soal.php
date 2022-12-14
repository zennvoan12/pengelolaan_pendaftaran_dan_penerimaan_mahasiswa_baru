<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pendaftars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Soal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::user()->id;
        $db = DB::table('pendaftars')->where('user_id', $id)->where('nilai_ujian', '>=', '0')->first();
        if($db == true){
            return redirect()->back();
        }
        return $next($request);
    }
}
