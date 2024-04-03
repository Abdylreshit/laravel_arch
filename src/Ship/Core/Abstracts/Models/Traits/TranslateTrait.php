<?php

namespace App\Ship\Core\Abstracts\Models\Traits;

use Spatie\Translatable\HasTranslations;

trait TranslateTrait
{
    use HasTranslations;

    public function trans(string $fieldName)
    {
        return $this->translate($fieldName, app()->getLocale());
    }
}
