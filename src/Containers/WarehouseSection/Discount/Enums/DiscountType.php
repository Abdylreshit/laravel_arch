<?php

namespace App\Containers\WarehouseSection\Discount\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class DiscountType extends Enum
{
    const PERCENTAGE = 'PERCENTAGE';

    const AMOUNT = 'AMOUNT';
}
