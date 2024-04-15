<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class MainResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => [
                'en' => $this->translate('name', 'en'),
                'ru' => $this->translate('name', 'ru'),
            ],
            'description' => [
                'en' => $this->translate('description', 'en'),
                'ru' => $this->translate('description', 'ru'),
            ],
            'symbol' => $this->symbol,
            'type' => new EnumResource($this->type),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
