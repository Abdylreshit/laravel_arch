<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainResource extends Resource
{
    public function toArray($request)
    {
        if (config('category.image')) {
            return [
                'id' => $this->id,
                'name' => [
                    'en' => $this->translate('name', 'en'),
                    'ru' => $this->translate('name', 'ru'),
                ],
                'description' => [
                    'en' => $this->translate('description', 'en'),
                    'ru' => $this->translate('description', 'ru'),
                ],
                'slug' => $this->slug,
                'parent_id' => $this->parent_id,
                'priority' => $this->priority,
                'images' => $this
                    ->getMedia('images')
                    ?->map(fn ($image) => $image->getFullUrl()),
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => [
                    'en' => $this->translate('name', 'en'),
                    'ru' => $this->translate('name', 'ru'),
                ],
                'description' => [
                    'en' => $this->translate('description', 'en'),
                    'ru' => $this->translate('description', 'ru'),
                ],
                'slug' => $this->slug,
                'parent_id' => $this->parent_id,
                'priority' => $this->priority,
            ];
        }
    }
}
