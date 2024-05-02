<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditByIdMeasurementUnitTask extends Task
{
    public function execute($id, array $data)
    {
        $measurementUnit = MeasurementUnit::query()->findOrFail($id);

        try {
            $measurementUnit->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $measurementUnit->translate('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $measurementUnit->translate('name', 'ru'),
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? $measurementUnit->translate('description', 'en'),
                    'ru' => $data['description']['ru'] ?? $measurementUnit->translate('description', 'ru'),
                ],
                'type' => $data['type'] ?? $measurementUnit->type,
                'symbol' => $data['symbol'] ?? $measurementUnit->symbol,
                'conversion_factor_to_base_unit' => $data['conversion_factor_to_base_unit'] ?? $measurementUnit->conversion_factor_to_base_unit,
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $measurementUnit;
    }
}
