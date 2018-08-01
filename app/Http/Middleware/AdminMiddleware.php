<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 14:06
 */

namespace App\Http\Middleware;


use Closure;

class AdminMiddleware
{
    public function handle($request,Closure $next){
        if($request->session()->has('user')&& $request->session()->get('user')[0]->role=='admin'){
            return $next($request);
        }
        else{
            return redirect('/')->withErrors('You cant access that page!');
        }
    }

}