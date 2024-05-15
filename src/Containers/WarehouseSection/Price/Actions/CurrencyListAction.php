<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Actions\Action;

class CurrencyListAction extends Action
{
    public function handle($filters = [])
    {
        return Currency::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn ($q) => $q->whereLikeLocale('name', "%$search%"))
                    ->orWhere(fn ($q) => $q->where('code', $search))
                    ->orWhere(fn ($q) => $q->where('symbol', $search));
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
