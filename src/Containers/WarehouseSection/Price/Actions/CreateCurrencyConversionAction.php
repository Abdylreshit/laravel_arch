<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\CreateCurrencyConversionTask;
use App\Containers\WarehouseSection\Price\Tasks\FindCurrencyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateCurrencyConversionAction extends Action
{
    public function handle($currencyId, array $data)
    {
        $currency = app(FindCurrencyByIdTask::class)->execute($currencyId);

        $conversion = app(CreateCurrencyConversionTask::class)->execute($currency, [
            'rate' => $data['rate'],
            'valid_from' => $data['valid_from'],
            'valid_to' => $data['valid_to'],
            'note' => $data['note'],
            'is_active' => $data['is_active'],
        ]);

        return $conversion;
    }
}
