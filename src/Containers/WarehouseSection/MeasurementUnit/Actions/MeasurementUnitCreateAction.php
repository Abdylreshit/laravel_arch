<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\CreateMeasurementUnitTask;
use App\Ship\Core\Abstracts\Actions\Action;

class MeasurementUnitCreateAction extends Action
{
    public function handle(array $data)
    {
        return app(CreateMeasurementUnitTask::class)->execute([
            'name' => [
                'ru' => $data['name']['ru'],
                'en' => $data['name']['en'],
            ],
            'description' => [
                'ru' => $data['description']['ru'] ?? null,
                'en' => $data['description']['en'] ?? null,
            ],
            'symbol' => $data['symbol'],
            'measurement_id' => $data['measurement_id']
        ]);
    }
}
