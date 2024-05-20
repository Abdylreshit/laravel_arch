<?php

namespace App\Containers\WarehouseSection\Price\Data\Seeders;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Containers\WarehouseSection\Price\Tasks\FindCurrencyByCodeTask;
use App\Containers\WarehouseSection\Price\Tasks\UpdateOrCreateCurrencyTask;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $data = file_get_contents(base_path('src/Containers/WarehouseSection/Price/Data/currencies.json'));

        $data = json_decode($data, true);

        foreach ($data as $currency) {
            app(UpdateOrCreateCurrencyTask::class)
                ->execute(
                    [
                        'code' => $currency['code'],
                    ],
                    [
                        'name' => $currency['name'],
                        'symbol' => $currency['symbol']
                    ]
                );
        }

        $currencies = Currency::all();

        foreach ($data as $currency) {
            $c = app(FindCurrencyByCodeTask::class)->execute($currency['code']);

            $c->conversions()->create([
                'base_currency_id' => getBaseCurrency()->id,
                'to_currency_id' => $c->id,
                'rate' => $currency['conversion'],
                'valid_from' => now(),
                'valid_to' => null,
                'is_active' => true,
                'note' => 'Default rate',
            ]);
        }
    }
}
