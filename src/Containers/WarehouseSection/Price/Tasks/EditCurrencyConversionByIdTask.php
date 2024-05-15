<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\CurrencyConversion;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditCurrencyConversionByIdTask extends Task
{
    public function execute($id, array $data)
    {
        $currencyConversion = CurrencyConversion::query()->findOrFail($id);

        try {
            $currencyConversion->update([
                'rate' => $data['rate'],
                'valid_from' => $data['valid_from'] ?? $currencyConversion->valid_from,
                'valid_to' => $data['valid_to'] ?? $currencyConversion->valid_to,
                'is_active' => $data['is_active'] ?? $currencyConversion->is_active,
                'note' => $data['note'] ?? $currencyConversion->note,
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $currencyConversion;
    }
}
