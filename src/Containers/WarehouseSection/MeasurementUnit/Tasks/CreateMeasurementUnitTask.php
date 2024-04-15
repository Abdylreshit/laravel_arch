<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateMeasurementUnitTask extends Task
{
    public function execute(array $data)
    {
        try {
            $measurementUnit = MeasurementUnit::create([
                'name' => [
                    'en' => $data['name']['en'],
                    'ru' => $data['name']['ru'],
                ],
                'description' => [
                    'en' => $data['description']['en'],
                    'ru' => $data['description']['ru'],
                ],
                'type' => $data['type'],
                'symbol' => $data['symbol'],
                'conversion_factor_to_base_unit' => $data['conversion_factor_to_base_unit'],
            ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $measurementUnit;
    }
}
