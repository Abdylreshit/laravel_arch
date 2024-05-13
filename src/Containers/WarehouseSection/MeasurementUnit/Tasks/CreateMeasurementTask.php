<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateMeasurementTask extends Task
{
    public function execute(array $data)
    {
        try {
            $measurement = Measurement::create([
                'name' => [
                    'en' => $data['name']['en'],
                    'ru' => $data['name']['ru'],
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? null,
                    'ru' => $data['description']['ru'] ?? null,
                ],
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $measurement;
    }
}
