<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Supported locales for the application.
     */
    public const LOCALES = ['en', 'fr', 'pt', 'sw'];

    /**
     * Set the application locale and redirect back.
     */
    public function setLocale(Request $request, string $locale): RedirectResponse
    {
        if (! in_array($locale, self::LOCALES, true)) {
            $locale = config('app.locale', 'en');
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return redirect()->back();
    }
}
