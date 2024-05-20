<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListMeasurementResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainMeasurementResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
