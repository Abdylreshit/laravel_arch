<?php

declare(strict_types=1);

use App\Containers\StaffSection\Staff\Enums\StateEnum;

return [

    StateEnum::class => [
        StateEnum::OFFLINE => 'Offline',
        StateEnum::ONLINE => 'Online',
        StateEnum::AFK => 'Away from keyboard',
        StateEnum::DO_NOT_DISTURB => 'Do not disturb',
    ],

];
