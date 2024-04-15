<?php

use App\Containers\StaffSection\Staff\Enums\StateEnum;

return [

    StateEnum::class => [
        StateEnum::OFFLINE => 'Онлайн',
        StateEnum::ONLINE => 'Офлайн',
        StateEnum::AFK => 'Вдали от клавиатуры',
        StateEnum::DO_NOT_DISTURB => 'Не беспокоить',
    ],

];
