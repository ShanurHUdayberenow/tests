<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class Locale
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
        $request_locale = $request->session()->get('locale');
        if (in_array($request_locale, Config::get('app.locales'))) {
            $locale = $request_locale;
        } else {
            $locale = Config::get('app.locale');
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
