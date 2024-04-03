<?php

namespace App\Ship\Core\Abstracts\Providers;

use App\Ship\Core\Loaders\RoutesLoaderTrait;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as LaravelRouteServiceProvider;

abstract class RouteServiceProvider extends LaravelRouteServiceProvider
{
    use RoutesLoaderTrait;

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        //        $this->Routes(function () {
        //            Route::middleware('api')
        //                ->prefix('api')
        //                ->group(base_path('Routes/api.php'));
        //
        //            Route::middleware('web')
        //                ->group(base_path('Routes/web.php'));
        //        });
    }

    /**
     * Define the Routes for the application.
     */
    public function map(): void
    {
        $this->runRoutesAutoLoader();
    }
}
