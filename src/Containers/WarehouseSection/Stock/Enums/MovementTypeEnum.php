<?php

namespace App\Containers\WarehouseSection\Stock\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class MovementTypeEnum extends Enum
{
    const PURCHASE = 'PURCHASE';

    const SALE = 'SALE';

    const WRITE_OFF = 'WRITE_OFF';

    const TRANSFER = 'TRANSFER';
}
