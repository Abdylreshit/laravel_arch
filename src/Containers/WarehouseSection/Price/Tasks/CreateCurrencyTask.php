<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateCurrencyTask extends Task
{
    public function execute(array $data)
    {
        try {
            $currency = Currency::query()->create([
                'name' => [
                    'en' => $data['name']['en'],
                    'ru' => $data['name']['ru']
                ],
                'code' => $data['code'],
                'symbol' => $data['symbol']
            ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $currency;
    }
}
