<?php

namespace App\Containers\UserSection\Staff\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListStaffResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MainStaffResource::collection($this->collection),
            'pagination' => $this->paginationResource(),
        ];
    }
}
