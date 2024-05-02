<?php

namespace App\Containers\WarehouseSection\Supplier\Actions;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Actions\Action;

class ListAction extends Action
{
    public function handle($filters = [])
    {
        return Supplier::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%");
            })
            ->when(array_key_exists('sort', $filters), function ($query) use ($filters) {
                return $query->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('sort', $filters), function ($query) {
                return $query->orderBy('id');
            })
            ->paginate($filters['limit'] ?? 10);
    }
}
