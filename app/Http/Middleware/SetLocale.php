<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check session first, then cookie, then default to lt
        $locale = Session::get('locale');
        
        if (!$locale) {
            $locale = $request->cookie('locale', 'lt');
        }
        
        if (!in_array($locale, ['en', 'lt'])) {
            $locale = 'lt';
        }
        
        App::setLocale($locale);
        
        // Ensure session has the locale
        if (!Session::has('locale')) {
            Session::put('locale', $locale);
        }
        
        return $next($request);
    }
}
