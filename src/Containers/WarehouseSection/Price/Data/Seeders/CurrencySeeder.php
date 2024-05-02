<?php

namespace App\Containers\WarehouseSection\Price\Data\Seeders;

use App\Containers\WarehouseSection\Price\Tasks\UpdateOrCreateCurrencyTask;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $currencies = file_get_contents(base_path('src/Containers/WarehouseSection/Price/Data/currencies.json'));

        foreach (json_decode($currencies, true) as $currency) {
            app(UpdateOrCreateCurrencyTask::class)
                ->execute(
                    [
                        'code' => $currency['code'],
                    ],
                    $currency
                );
        }
    }
}
