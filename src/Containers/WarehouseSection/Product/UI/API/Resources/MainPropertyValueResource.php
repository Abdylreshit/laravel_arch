<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainPropertyValueResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'value' => [
                'ru' => $this->translate('value', 'ru'),
                'en' => $this->translate('value', 'en'),
            ],
        ];
    }
}
