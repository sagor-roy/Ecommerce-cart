<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Customer
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
        if(!session()->has('customer')){
            session()->flash('type','danger');
            session()->flash('message','You must logged in');
            return redirect('customer/login');
        }
        return $next($request);
    }
}
