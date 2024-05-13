<?php

namespace App\Containers\WarehouseSection\Product\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

class ProductType extends Enum implements  LocalizedEnum
{
//    const CONFIGURABLE = 'CONFIGURABLE';

    const SIMPLE = 'SIMPLE';

    const BUNDLE = 'BUNDLE';

//    const VIRTUAL = 'VIRTUAL';
}
