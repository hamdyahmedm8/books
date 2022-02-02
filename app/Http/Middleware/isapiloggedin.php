<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class isapiloggedin
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
        if(isset($request->access_token) && $request->access_token!=null)
        {
            $user=User::where('access_token',$request->access_token)->first();
            if($user!=null)
                return $next($request);
        }
        
        return response()->json(['error'=>'not valid user']);
        
    }

}
