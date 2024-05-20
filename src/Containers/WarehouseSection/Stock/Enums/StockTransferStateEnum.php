<?php

namespace App\Containers\WarehouseSection\Stock\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class StockTransferStateEnum extends Enum
{
    const PENDING = 'PENDING';
    const SHIPPED = 'SHIPPED';
    const IN_TRANSIT = 'IN_TRANSIT';
    const DELIVERED = 'DELIVERED';
    const CANCELED = 'CANCELED';
    const SUCCESS = 'SUCCESS';
}
