<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Actions\Action;

class MeasurementListAction extends Action
{
    public function handle(array $filters = [])
    {
        return Measurement::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn ($q) => $q->whereLikeLocale('name', $search))
                    ->orWhere(fn ($q) => $q->whereLikeLocale('description', $search));
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
