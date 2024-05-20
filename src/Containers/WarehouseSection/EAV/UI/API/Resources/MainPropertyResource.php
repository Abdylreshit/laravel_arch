<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainPropertyResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'ru' => $this->getTrans('name', 'ru'),
                'en' => $this->getTrans('name', 'en'),
            ],
            'code' => $this->code,
            'type' => $this->type,
        ];
    }
}
