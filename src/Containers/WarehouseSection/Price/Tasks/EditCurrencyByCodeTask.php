<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditCurrencyByCodeTask extends Task
{
    public function execute($code, array $data)
    {
        $currency = Currency::query()
            ->where('code', $code)
            ->firstOrFail();

        try {
            $currency->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $currency->getTrans('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $currency->getTrans('name', 'ru')
                ],
                'code' => $data['code'] ?? $currency->code,
                'symbol' => $data['symbol'] ?? $currency->symbol
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $currency;
    }
}
