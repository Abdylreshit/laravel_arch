<?php

namespace App\Containers\WarehouseSection\Stock\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class TransferStateEnum extends Enum
{
    const PENDING = 'PENDING';

    const ACCEPTED = 'ACCEPTED';

    const REJECTED = 'REJECTED';

    const CANCELED = 'CANCELED';
}
