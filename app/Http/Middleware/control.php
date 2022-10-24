<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class control
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$process)
    {   
        if ($request->header("token") == null) {
            return response(['status'=>0,'message'=>"unauthorized"]);
        }
        if (!Hash::check(getinfos()->mobile_api_private, $request->header("token"))) {
            return response(['status'=>0,'message'=>"unauthorized"]);
        }
        if ($process == "key") {
            $key = $request->header("key");
            if ($key == null || $key == "") {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            $user_id = $request->header('user-id');
            $user = User::find($user_id);
            if ($user == null) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            if (!Hash::check($user->api_private,$key)) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            
        }
        return $next($request);
    }
}
