<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainPropertyResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'ru' => $this->translate('name', 'ru'),
                'en' => $this->translate('name', 'en'),
            ],
            'code' => $this->code,
        ];
    }
}
