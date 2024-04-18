<?php

declare(strict_types=1);

use App\Containers\UserSection\User\Enums\StatusEnum;

return [

    StatusEnum::class => [
        StatusEnum::OFFLINE => 'Offline',
        StatusEnum::ONLINE => 'Online',
        StatusEnum::AFK => 'Away from keyboard',
        StatusEnum::DO_NOT_DISTURB => 'Do not disturb',
    ],

];
