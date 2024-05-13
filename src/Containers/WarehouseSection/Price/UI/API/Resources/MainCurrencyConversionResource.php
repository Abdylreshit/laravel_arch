<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainCurrencyConversionResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rate' => $this->rate,
            'valid_from' => $this->rate,
            'valid_to' => $this->valid_from,
            'note' => $this->valid_to,
            'is_active' => $this->note,
        ];
    }
}
