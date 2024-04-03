<?php

namespace App\Ship\Core\Abstracts\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection as BaseResourceCollection;

abstract class ResourceCollection extends BaseResourceCollection
{
    protected function paginationResource(): array
    {
        return [
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'prev_page_url' => $this->previousPageUrl(),
            'next_page_url' => $this->nextPageUrl(),
            'per_page' => $this->perPage(),
            'total' => $this->total(),
            'count' => $this->count(),
        ];
    }
}
