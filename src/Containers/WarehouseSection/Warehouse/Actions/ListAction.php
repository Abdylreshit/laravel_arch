<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Actions\Action;

class ListAction extends Action
{
    public function handle(array $filters = [])
    {
        return Warehouse::query()
            ->when(array_key_exists('search', $filters), function ($q) use ($filters) {
                return $q
                    ->where('name', 'LIKE', "%{$filters['search']}%")
                    ->orWhere('code', 'LIKE', "%{$filters['search']}%");
            })
            ->when(array_key_exists('sort', $filters), function ($q) use ($filters) {
                return $q->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('sort', $filters), function ($q) {
                return $q->orderBy('created_at', 'desc');
            })
            ->paginate($filters['limit'] ?? 10);
    }
}
