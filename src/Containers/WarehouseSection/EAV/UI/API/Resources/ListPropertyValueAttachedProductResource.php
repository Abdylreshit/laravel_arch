<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Resources;


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
            'type' => $this->type,
            'values' => MainPropertyValueResource::collection($this->values)
        ];
    }
}
