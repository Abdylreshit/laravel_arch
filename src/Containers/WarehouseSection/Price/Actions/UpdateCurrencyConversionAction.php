<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\EditCurrencyConversionByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateCurrencyConversionAction extends Action
{
    public function handle($id, array $data)
    {
        $currencyConversion = app(EditCurrencyConversionByIdTask::class)->run($id, [
            'rate' => $data['rate'],
            'valid_from' => $data['valid_from'],
            'valid_to' => $data['valid_to'],
            'is_active' => $data['is_active'],
            'note' => $data['note'],
        ]);

        return $currencyConversion;
    }
}
