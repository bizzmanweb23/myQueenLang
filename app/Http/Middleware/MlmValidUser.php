<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PvPoint;
use Auth;

class MlmValidUser
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
        $user = User::find(Auth::id());
        $pv_point = PvPoint::where('user_id',$user->user_id)->first();
        if($pv_point->point < 88 ){
            // Auth::logout();
            return redirect()->route('shop')->with('warning','You are not eligible for MLM please spend minimum of $88');
        }else{
            return $next($request);
        }
    }
}
