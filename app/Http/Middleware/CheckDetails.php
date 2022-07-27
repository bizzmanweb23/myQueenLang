<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\MlmUser;
use App\Models\Ranking;
use App\Models\User;
use Auth;

class CheckDetails
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
        $user_details = User::where('id', Auth::user()->id)->first();
        $user_id = $user_details->user_id;
        $ranking = Ranking::where('user_id',$user_id)->first();
        if($user_details == ''){
            return redirect()->route('User-Details');
        }elseif( $ranking == ''){
            return redirect()->route('MemberShip-Selection');
        }else{
            return $next($request);
        }
    }
}
