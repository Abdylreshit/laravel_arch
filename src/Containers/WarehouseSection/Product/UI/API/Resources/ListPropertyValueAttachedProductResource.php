<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;


use App\Ship\Core\Abstracts\Resources\Resource;

class ListPropertyValueAttachedProductResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'en' => $this->translate('name', 'en'),
                'ru' => $this->translate('name', 'ru'),
            ],
            'values' => MainPropertyValueResource::collection($this->values)
        ];
    }
}
