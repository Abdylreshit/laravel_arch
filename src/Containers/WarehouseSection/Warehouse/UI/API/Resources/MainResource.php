<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'is_blocked' => $this->is_blocked,
        ];
    }
}
