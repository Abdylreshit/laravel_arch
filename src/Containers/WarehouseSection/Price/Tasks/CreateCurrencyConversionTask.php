<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateCurrencyConversionTask extends Task
{
    public function execute(Currency $currency, array $data)
    {
        try {
            $currency->conversions()->create([
                'base_currency_id' => getBaseCurrency()->id,
                'rate' => $data['rate'],
                'valid_from' => $data['valid_from'] ?? now(),
                'valid_to' => $data['valid_to'] ?? now()->addYear(),
                'note' => $data['note'] ?? null,
                'is_active' => $data['is_active'],
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $currency;
    }
}
