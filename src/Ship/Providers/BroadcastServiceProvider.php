<?php

namespace App\Ship\Providers;

use App\Ship\Core\Abstracts\Providers\BroadcastServiceProvider as MainBroadcastServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends MainBroadcastServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require base_path('src/Ship/Broadcasts/channels.php');
    }
}
