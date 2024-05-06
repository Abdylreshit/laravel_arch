<?php

namespace App\Containers\WarehouseSection\Product\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class PropertyType extends Enum
{
    const TEXT = 'TEXT';
    const DECIMAL = 'DECIMAL';
    const INTEGER = 'INTEGER';
    const BOOLEAN = 'BOOLEAN';
    const COLOR = 'COLOR';
}
