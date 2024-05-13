<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class MainProductResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'ru' => $this->translate('name', 'ru'),
                'en' => $this->translate('name', 'en'),
            ],
            'description' => [
                'ru' => $this->translate('description', 'ru'),
                'en' => $this->translate('description', 'en'),
            ],
            'type' => new EnumResource($this->type),
            'images' => $this
                ->getMedia()
                ?->map(fn($image) => $image->getFullUrl()),
        ];
    }
}
