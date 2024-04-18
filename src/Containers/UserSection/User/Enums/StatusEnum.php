<?php

declare(strict_types=1);

namespace App\Containers\UserSection\User\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class StatusEnum extends Enum implements LocalizedEnum
{
    const ONLINE = 'ONLINE';

    const OFFLINE = 'OFFLINE';

    const AFK = 'AFK';

    const DO_NOT_DISTURB = 'DO_NOT_DISTURB';
}
