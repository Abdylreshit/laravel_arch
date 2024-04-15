<?php

namespace App\Ship\Core\Providers;

use App\Ship\Core\Abstracts\Providers\MainServiceProvider as AbstractMainServiceProvider;
use App\Ship\Core\Foundation\Porto;
use App\Ship\Core\Loaders\AutoLoaderTrait;
use Illuminate\Support\Facades\Schema;

class PortoServiceProvider extends AbstractMainServiceProvider
{
    use AutoLoaderTrait;

    public function register(): void
    {
        // NOTE: function order of this calls bellow are important. Do not change it.

        $this->app->bind('Porto', Porto::class);
        // Register Core Facade Classes, should not be registered in the $aliases property, since they are used
        // by the auto-loading scripts, before the $aliases property is executed.
        $this->app->alias(Porto::class, 'Porto');

        // parent::register() should be called AFTER we bind 'Porto'
        parent::register();

        $this->runLoaderRegister();
    }

    public function boot(): void
    {
        parent::boot();

        // Autoload most of the Containers and Ship Components
        $this->runLoadersBoot();

        // Solves the "specified key was too long" error, introduced in L5.4
        //        Schema::defaultStringLength(191);

        // Registering custom validation rules
        //        $this->extendValidationRules();
    }
}
