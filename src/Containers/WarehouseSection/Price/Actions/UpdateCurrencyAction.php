<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\EditCurrencyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateCurrencyAction extends Action
{
    public function handle($id, array $data)
    {
        $currency = app(EditCurrencyByIdTask::class)->execute($id, [
            'name' => [
                'ru' => $data['name']['ru'],
                'en' => $data['name']['en'],
            ],
            'code' => $data['code'],
            'symbol' => $data['symbol'],
        ]);

        return $currency;
    }
}
