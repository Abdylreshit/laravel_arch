<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Data\Seeders;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\UpdateOrCreateMeasurementUnitTask;
use App\Ship\Core\Abstracts\Seeders\Seeder;
use Illuminate\Support\Str;

class MeasurementUnitSeeder extends Seeder
{
    public function run()
    {
        $measurementUnits = file_get_contents(base_path('src/Containers/WarehouseSection/MeasurementUnit/Data/measurement_units.json'));

        foreach (json_decode($measurementUnits, true) as $measurementUnit) {
            app(UpdateOrCreateMeasurementUnitTask::class)
                ->execute(
                    [
                        'code' => Str::upper(Str::slug($measurementUnit['symbol'])),
                    ],
                    $measurementUnit
                );
        }
    }
}
