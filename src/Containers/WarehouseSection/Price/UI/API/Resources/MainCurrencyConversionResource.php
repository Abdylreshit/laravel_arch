<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainCurrencyConversionResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'base_currency' => new MainCurrencyResource($this->baseCurrency),
            'to_currency' => new MainCurrencyResource($this->toCurrency),
            'rate' => $this->rate,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
            'note' => $this->note,
            'is_active' => $this->is_active,
        ];
    }
}
