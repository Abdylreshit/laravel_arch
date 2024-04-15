<?php

namespace App\Ship\Providers;

use App\Ship\Core\Abstracts\Providers\MainServiceProvider as ParentMainServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Horizon\HorizonServiceProvider;

class ShipServiceProvider extends ParentMainServiceProvider
{
    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     */
    public array $serviceProviders = [
        BroadcastServiceProvider::class,
        HorizonServiceProvider::class,
        RouteServiceProvider::class,
    ];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     */
    protected array $aliases = [];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //        DB::listen(function ($sql) {
        //            Log::info('start');
        //            Log::info($sql->sql);
        //            Log::info($sql->bindings);
        //            Log::info($sql->time);
        //            Log::info('end');
        //        });
        parent::boot();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        Config::macro('unset', function ($key) {
            Arr::forget($this->items, $key);
        });
    }
}
