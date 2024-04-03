<?php

namespace App\Ship\Middlewares;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $lang = $request->header('Accept-Language');

        if ($lang != null && in_array($lang, ['ru', 'en'])) {
            app()->setLocale($lang);

            return $next($request);
        }

        app()->setLocale('ru');

        return $next($request);
    }
}
