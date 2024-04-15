<?php

declare(strict_types=1);

use App\Containers\WarehouseSection\MeasurementUnit\Enums\TypeEnum;

return [

    TypeEnum::class => [
        TypeEnum::MASS => 'Mass',
        TypeEnum::VOLUME => 'Volume',
        TypeEnum::AREA => 'Area',
    ],
];
