<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class MainMeasurementResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'en' => $this->getTrans('name', 'en'),
                'ru' => $this->getTrans('name', 'ru'),
            ],
            'description' => [
                'en' => $this->getTrans('description', 'en'),
                'ru' => $this->getTrans('description', 'ru'),
            ]
        ];
    }
}
