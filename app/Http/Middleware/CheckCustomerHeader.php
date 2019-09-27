<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckCustomerHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = request()->header('Authorization');
        $role = request()->header('Role');
        if(!isset($token) || !isset($role))
        {
            return Response::json(array('error'=>'Please set Authorization and role in header'));
        }
        $user = User::where('remember_token',$token)->first();
        if($user && $role == 'customer')
        {
            return $next($request);

        }
        else
        {
            return Response::json(array('error'=>'UnAuthorized User'));
        }
      //  return $next($request);
    }   
}
