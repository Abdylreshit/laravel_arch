<?php

namespace App\Containers\WarehouseSection\Stock\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class StockPurchaseStateEnum extends Enum
{
    const DRAFT = 'DRAFT';
    const ORDERED = 'ORDERED';
    const DELIVERING = 'DELIVERING';
    const CONFIRMED = 'CONFIRMED';
    const CANCELED = 'CANCELED';
}
