<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!$request->expectsJson()){
            if($request->is('admin') || $request->is('admin/*')){
                return route('admin.showLogin');
            }
            if($request->is('advertiser') || $request->is('advertiser/*')){
                return route('advertiser.showLogin');
            }
            if($request->is('subscription') || $request->is('subscription/*')){
                return route('home');
            }
            return route('login');
        }
        return null;
    }
}
