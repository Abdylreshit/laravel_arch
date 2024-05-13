<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\CreateCurrencyTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateCurrencyAction extends Action
{
    public function handle(array $data)
    {
        $currency = app(CreateCurrencyTask::class)->execute([
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
