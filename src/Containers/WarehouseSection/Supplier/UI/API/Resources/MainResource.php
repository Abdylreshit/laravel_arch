<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'note' => $this->note,
        ];
    }
}
