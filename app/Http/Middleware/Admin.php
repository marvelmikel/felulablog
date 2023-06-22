<?php

namespace  App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth()->user()->role != 'Admin' ){
           if( $request->isJson()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are not allowed to perform this action',
                ], 401);
           }else{
                return redirect()->route('user.dashboard')->with('error', 'Access Denied');
           }
        }

        return $next($request);
    }
}
