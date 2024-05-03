<?php

namespace App\Containers\WarehouseSection\Price\Middlewares;

use App\Ship\Core\Abstracts\Middlewares\Middleware;

class SetCurrency extends Middleware
{
    public function handle($request, \Closure $next)
    {
        $currency = $request->header('Accept-Currency') ?? 'USD';

        app('currency')->setCurrency($currency);

        return $next($request);
    }
}
