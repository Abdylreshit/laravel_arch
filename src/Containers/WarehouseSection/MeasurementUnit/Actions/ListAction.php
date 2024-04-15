<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Actions\Action;
use Illuminate\Support\Collection;

class ListAction extends Action
{
    public function handle($filters): Collection
    {
        return MeasurementUnit::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];
                return $query
                    ->where('code', 'like', "%$search%")
                    ->orWhere(fn ($q) => $q->whereLikeLocale('name', "%$search%"))
                    ->orWhere(fn ($q) => $q->whereLikeLocale('description', "%$search%"));
            })
            ->when(array_key_exists('sort', $filters), function ($query) use ($filters) {
                return $query->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('search', $filters), function ($query) {
                return $query->orderBy('type');
            })
            ->get();
    }
}
