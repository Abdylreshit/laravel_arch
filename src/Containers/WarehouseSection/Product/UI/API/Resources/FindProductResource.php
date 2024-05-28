<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Containers\WarehouseSection\Category\UI\API\Resources\MainResource;
use App\Containers\WarehouseSection\EAV\UI\API\Resources\MainPropertyValueResource;
use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class FindProductResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'ru' => $this->getTrans('name', 'ru'),
                'en' => $this->getTrans('name', 'en')
            ],
            'description' => [
                'ru' => $this->getTrans('description', 'ru'),
                'en' => $this->getTrans('description', 'en')
            ],
            'type' => new EnumResource($this->type),
            'items' => new FindProductResource($this->items),
            'images' => $this->getMedia()
                ?->map(fn($image) => $image->getFullUrl()),
            'property_values' => MainPropertyValueResource::collection($this->propertyValues),
            'categories' => MainResource::collection($this->categories),
            'prices' => $this->prices->map(fn($price) => [
                'value' => $price->price,
                'currency' => [
                    'id' => $price->currency->id,
                    'name' => $price->currency->name,
                    'code' => $price->currency->code,
                    'symbol' => $price->currency->symbol,
                ],
                'warehouse' => [
                    'id' => $price->warehouse->id,
                    'name' => $price->warehouse->name,
                ],
            ])
        ];
    }
}
