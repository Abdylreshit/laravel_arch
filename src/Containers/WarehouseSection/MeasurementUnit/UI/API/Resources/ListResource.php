<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class ListResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => [
                'en' => $this->getTrans('name', 'en'),
                'ru' => $this->getTrans('name', 'ru'),
            ],
            'description' => [
                'en' => $this->getTrans('description', 'en'),
                'ru' => $this->getTrans('description', 'ru'),
            ],
            'symbol' => $this->symbol,
            'type' => new EnumResource($this->type),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
