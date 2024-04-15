<?php

namespace App\Ship\Core\Abstracts\Enums;

use BenSampo\Enum\Enum as BaseEnum;

abstract class Enum extends BaseEnum
{
    public static function getLocalizationKey(): string
    {
        return getSectionName(static::class).'@'.getContainerName(static::class).'::enums.'.static::class;
    }
}
