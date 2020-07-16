<?php

namespace App\Http\Middleware;

use App;
use Session;
use Closure;

class Locale
{
    public static function getLocale()
    {
        $uri = \Request::path(); 
        $segmentsURI = explode('/', $uri);
        
        if (!empty($segmentsURI[0])) 
            return $segmentsURI[0];

        return 'en'; 
    }

    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        App::setLocale($locale);

        return $next($request);
    }
}
