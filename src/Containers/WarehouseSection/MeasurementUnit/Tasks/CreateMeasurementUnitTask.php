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
                'symbol' => $data['symbol'],
                'measurement_id' => $data['measurement_id']
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $measurementUnit;
    }
}
