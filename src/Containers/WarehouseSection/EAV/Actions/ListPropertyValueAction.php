<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Ship\Core\Abstracts\Actions\Action;

class ListPropertyValueAction extends Action
{
    public function handle($filters = [])
    {
        return PropertyValue::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn ($q) => $q->whereLikeLocale('value', "%$search%"));
            })
            ->when(array_key_exists('sort', $filters), function ($query) use ($filters) {
                return $query->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('sort', $filters), function ($query) {
                return $query->orderBy('id');
            })
            ->when(array_key_exists('property_id', $filters), function ($query) use ($filters) {
                return $query->where('property_id', $filters['property_id']);
            })
            ->paginate($filters['limit'] ?? 10);
    }
}
