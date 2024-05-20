<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Actions\Action;
use Illuminate\Support\Str;

class CurrencyListAction extends Action
{
    public function handle($filters = [])
    {
        return Currency::query()
            ->when(array_key_exists('search', $filters) && $filters['search'] != null && Str::length($filters['search']) != 0, function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn ($q) => $q->whereLikeLocale('name', "$search"))
                    ->orWhere(fn ($q) => $q->where('code', $search))
                    ->orWhere(fn ($q) => $q->where('symbol', $search));
            })
            ->when(array_key_exists('sort', $filters) && $filters['sort'] != null && Str::length($filters['sort']) != 0, function ($query) use ($filters) {
                return $query->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('sort', $filters) || $filters['sort'] == null || Str::length($filters['sort']) == 0, function ($query) {
                return $query->orderBy('id');
            })
            ->paginate($filters['limit'] ?? 10);
    }
}
