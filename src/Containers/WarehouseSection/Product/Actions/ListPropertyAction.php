<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Models\Property;
use App\Ship\Core\Abstracts\Actions\Action;

class ListPropertyAction extends Action
{
    public function handle($filters = [])
    {
        return Property::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn ($q) => $q->whereLikeLocale('name', "%$search%"));
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
