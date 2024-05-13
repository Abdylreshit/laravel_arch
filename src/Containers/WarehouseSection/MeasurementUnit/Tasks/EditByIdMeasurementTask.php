<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditByIdMeasurementTask extends Task
{
    public function execute($id, array $data)
    {
        $measurement = Measurement::query()->findOrFail($id);

        try {
            $measurement->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $measurement->translate('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $measurement->translate('name', 'ru'),
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? $measurement->translate('description', 'en'),
                    'ru' => $data['description']['ru'] ?? $measurement->translate('description', 'ru'),
                ],
            ]);
        } catch (\Exception) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $measurement;
    }
}
