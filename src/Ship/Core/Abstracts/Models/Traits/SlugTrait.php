<?php

namespace App\Ship\Core\Abstracts\Models\Traits;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

trait SlugTrait
{
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom($this->genSlugField)
            ->saveSlugsTo('slug');
    }
}
