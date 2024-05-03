<?php

namespace App\Containers\WarehouseSection\Price\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class DiscountType extends Enum
{
    const PERCENTAGE = 'PERCENTAGE';

    const AMOUNT = 'AMOUNT';
}
