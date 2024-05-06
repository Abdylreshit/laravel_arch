<?php

namespace App\Ship\Core\Abstracts\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

trait TranslateTrait
{
    use HasTranslations;

    public function getTrans(string $fieldName, ?string $locale = null)
    {
        $translate = $this->translate($fieldName, $locale ?? app()->getLocale());

        if (Str::length($translate) == 0) {
            return null;
        } else {
            return $translate;
        }
    }

    public function scopeWhereLikeLocale($query, $field, $value)
    {
        $locales = getBaseLocales();

        foreach ($locales as $locale) {
            $query->orWhere("$field->$locale", 'like', "%$value%");
        }
    }

    public function scopeWhereLocale($query, string $column, $locale)
    {
        $locale = $locale ?? app()->getLocale();

        return $query->whereNotNull("{$column}->{$locale}");
    }
}
