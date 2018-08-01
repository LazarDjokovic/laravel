<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 14.03.2018.
 * Time: 23:00
 */

namespace App\Http\Middleware;
use Closure;

class UserProfileMiddleware
{
    public function handle($request,Closure $next){
        if($request->session()->has('user')){
            return $next($request);
        }
        else{
            return redirect('/')->withErrors('You cant access that page!');
        }
    }

}