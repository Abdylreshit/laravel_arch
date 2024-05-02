<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;


use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListPropertyValueResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainPropertyValueResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
