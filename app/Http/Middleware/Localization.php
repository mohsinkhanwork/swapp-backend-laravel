<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class Localization
{
    public function handle($request, Closure $next)
    {
        $locale = $request->header('Accept-Language');

        if ($locale && in_array($locale, ['en', 'tr'])) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('app.fallback_locale')); // Default locale from config
        }

        return $next($request);
    }
}
