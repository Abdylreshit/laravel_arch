<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Containers\WarehouseSection\Product\Enums\ProductType;
use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class MainProductResource extends Resource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => [
                'ru' => $this->getTrans('name', 'ru'),
                'en' => $this->getTrans('name', 'en'),
            ],
            'description' => [
                'ru' => $this->getTrans('description', 'ru'),
                'en' => $this->getTrans('description', 'en'),
            ],
            'type' => new EnumResource($this->type),
            'images' => $this
                ->getMedia()
                ?->map(fn($image) => $image->getFullUrl()),
            'properties' => $this->properties
                ?->map(function ($property) {
                    $value = $this->propertyValues()->where('property_id', $property->id)->first();
                    return [
                        'id' => $property->id,
                        'name' => [
                            'ru' => $property->getTrans('name', 'ru'),
                            'en' => $property->getTrans('name', 'en'),
                        ],
                        'value' => $value?->value,
                        'type' => new EnumResource($property->type),
                        'value_id' => $value?->id,
                    ];
                }),

            $this->mergeWhen($this->type->is(ProductType::BUNDLE), [
                'items' => $this->bundleItems
                    ?->map(function ($item) {
                        return new MainProductResource($item);
                    }),
            ]),
        ];
    }
}
