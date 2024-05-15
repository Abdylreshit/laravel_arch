<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListCurrencyConversionResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainCurrencyConversionResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
