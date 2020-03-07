<?php

namespace App\Http\Middleware;

use App\Facades\LocalizationService;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $langPrefix = ltrim($request->route()->getPrefix(), '/');
//        $referer = Redirect::back()->getTargetUrl();
//        dd($request->route());
        /*if ($langPrefix) {
            App::setLocale($langPrefix);
        }*/

//        app()->setLocale($request->segment(1));

        App::setLocale(LocalizationService::getLocale());

        /*  if (session()->has('locale')) {
              App::setLocale(session()->get('locale'));
          }*/

        return $next($request);
    }
}
