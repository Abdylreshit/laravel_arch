<?php

namespace App\Containers\WarehouseSection\Product\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

class BarcodeType extends Enum implements  LocalizedEnum
{
//    const CONFIGURABLE = 'CONFIGURABLE';

    const PRIVATE = 'PRIVATE';

    const PUBLIC = 'PUBLIC';

//    const VIRTUAL = 'VIRTUAL';
}
