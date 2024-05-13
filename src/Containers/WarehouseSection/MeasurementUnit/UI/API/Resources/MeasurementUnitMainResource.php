<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class MeasurementUnitMainResource extends Resource
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
            'symbol' => $this->symbol
        ];
    }
}
