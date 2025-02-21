<?php

namespace App\Ship\Providers;

use App\Ship\Core\Abstracts\Providers\RouteServiceProvider as ParentRouteServiceProvider;

class RouteServiceProvider extends ParentRouteServiceProvider
{
    /**
     * The name of the web "home" route for your application.
     *
     * This is used by Porto authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = 'web_welcome_say_welcome';

    /**
     * The name of the web "login" route for your application.
     *
     * This is used by Porto authentication to redirect users if unauthenticated.
     *
     * @var string
     */
    public const LOGIN = 'login';

    /**
     * The name of the web "unauthorized" route for your application.
     *
     * This is used by Porto authentication to redirect users if unauthorized.
     *
     * @var string
     */
    public const UNAUTHORIZED = 'unauthorized';

    public function boot(): void
    {
        $this->configureRateLimiting();

        parent::boot();
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
    }
}
