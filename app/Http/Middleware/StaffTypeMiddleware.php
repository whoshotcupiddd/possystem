<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
//    public function handle($request, Closure $next)
//    {
//        if (Auth::check()) {
//            $user = Auth::user();
//            
//            // Check if the user has the 'staffType' relation loaded
//            if ($user->relationLoaded('staffType')) {
//                session(['staffType' => $user->staffType]);
//            } else {
//                // If not loaded, load the 'staffType' relation
//                $user->load('staffType');
//                session(['staffType' => $user->staffType]);
//            }
//        }
//
//        return $next($request);
    //}

}
