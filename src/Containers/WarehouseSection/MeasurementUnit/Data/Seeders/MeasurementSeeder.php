<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Data\Seeders;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\CreateMeasurementTask;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class MeasurementSeeder extends Seeder
{
    public function run()
    {
        $measurements = file_get_contents(base_path('src/Containers/WarehouseSection/MeasurementUnit/Data/measurements.json'));

        foreach (json_decode($measurements, true) as $measurement) {
            $m = app(CreateMeasurementTask::class)->execute([
                'name' => [
                    'en' => $measurement['name']['en'],
                    'ru' => $measurement['name']['ru'],
                ]
            ]);


            foreach ($measurement['units'] as $unit) {
                $m->units()->create([
                    'name' => [
                        'en' => $unit['name']['en'],
                        'ru' => $unit['name']['ru'],
                    ],
                    'description' => [
                        'en' => $unit['description']['en'] ?? null,
                        'ru' => $unit['description']['ru'] ?? null,
                    ],
                    'symbol' => $unit['symbol'],
                ]);
            }
        }
    }
}
