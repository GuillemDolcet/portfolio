<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Set the default language
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            $availableLanguages = Language::all()->pluck('name')->toArray();
            $userLanguages = preg_split('/,|;/', $request->server('HTTP_ACCEPT_LANGUAGE'));

            foreach ($availableLanguages as $language) {
                if(in_array($language, $userLanguages)) {
                    App::setLocale($language);
                    Session::put('locale', $language);
                    break;
                }
            }
        }

        return $next($request);
    }
}
