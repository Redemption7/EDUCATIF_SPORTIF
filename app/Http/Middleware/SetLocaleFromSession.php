<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleFromSession
{
    /**
     * Handle an incoming request. Set app locale from session so translations work.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            if (in_array($locale, ['en', 'fr', 'pt', 'sw'], true)) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }
}
