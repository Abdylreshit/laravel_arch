<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Resources;


use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListPropertyResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainPropertyResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
