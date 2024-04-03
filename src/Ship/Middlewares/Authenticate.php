<?php

namespace App\Ship\Middlewares;

use App\Ship\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as CoreMiddleware;

class Authenticate extends CoreMiddleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route(RouteServiceProvider::LOGIN);
        }
    }
}
