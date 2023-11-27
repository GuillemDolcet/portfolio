<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Set the default language
     */
    public function handle($request, Closure $next): Response|RedirectResponse
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            $availableLangs = Language::all()->pluck('name')->toArray();
            $userLangs = preg_split('/,|;/', $request->server('HTTP_ACCEPT_LANGUAGE'));

            foreach ($availableLangs as $lang) {
                if(in_array($lang, $userLangs)) {
                    App::setLocale($lang);
                    Session::push('locale', $lang);
                    break;
                }
            }
        }

        return $next($request);
    }
}
