<?php

use App\Containers\UserSection\User\Enums\StatusEnum;

return [

    StatusEnum::class => [
        StatusEnum::OFFLINE => 'Онлайн',
        StatusEnum::ONLINE => 'Офлайн',
        StatusEnum::AFK => 'Вдали от клавиатуры',
        StatusEnum::DO_NOT_DISTURB => 'Не беспокоить',
    ],

];
