<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class authMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        // dd($request->user()->role)

        if($request->user()->role == 'admin' or $request->user()->role == 'manager'){
            return $next($request);
        }else{
            return redirect()->route('noaccess');
        }

        // if($request->user()->role == 'manager'){
        //     return redirect()->route('singers.index');
        // }else{
        //     return redirect()->route('noaccess');
        // }

    }
}
