<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditCurrencyByIdTask extends Task
{
    public function execute($id, array $data)
    {
        $currency = Currency::query()->findOrFail($id);

        try {
            $currency->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $currency->translate('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $currency->translate('name', 'ru')
                ],
                'code' => $data['code'] ?? $currency->code,
                'symbol' => $data['symbol'] ?? $currency->symbol
            ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $currency;
    }
}
