<?php

declare(strict_types=1);

namespace App\Containers\WarehouseSection\MeasurementUnit\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class TypeEnum extends Enum implements LocalizedEnum
{
    const VOLUME = 'VOLUME';

    const AREA = 'AREA';

    const MASS = 'MASS';
}
