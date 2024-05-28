<?php

namespace App\Containers\CMS\Menu\Enums;

use App\Ship\Core\Abstracts\Enums\Enum;

class MenuTypeEnum extends Enum
{
    const TREE = 'tree';
    const SWITCH = 'switch';
    const SELECT = 'select';
    const INPUT = 'input';
    const RANGE = 'range';
    const COLOR = 'color';
}
