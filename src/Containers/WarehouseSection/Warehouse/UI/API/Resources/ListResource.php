<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
