<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListCurrencyResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainCurrencyResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
