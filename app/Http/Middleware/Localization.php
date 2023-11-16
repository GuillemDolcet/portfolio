<?php

namespace App\Http\Middleware;

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
        if(Session::get('locale') == null) {
            Session::put('locale', 'en');
        }
        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}
