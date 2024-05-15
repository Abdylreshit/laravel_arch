<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Models\CurrencyConversion;
use App\Ship\Core\Abstracts\Actions\Action;

class CurrencyConversionListAction extends Action
{
    public function handle($currencyId, $filters = [])
    {
        return CurrencyConversion::query()
            ->where('currency_id', $currencyId)
            ->when(array_key_exists('valid_from', $filters), function ($query) use ($filters) {
                return $query
                    ->where('valid_from', '<=', $filters['valid_from']);
            })
            ->when(array_key_exists('valid_to', $filters), function ($query) use ($filters) {
                return $query
                    ->where('valid_to', '>=', $filters['valid_to']);
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
