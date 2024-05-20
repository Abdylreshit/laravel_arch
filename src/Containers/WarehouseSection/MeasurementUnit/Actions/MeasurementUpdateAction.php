<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\EditByIdMeasurementTask;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\UpdateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class MeasurementUpdateAction extends Action
{
    public function handle($measurementId, array $data)
    {
        return app(EditByIdMeasurementTask::class)
            ->execute(
                $measurementId,
                [
                    'name' => [
                        'en' => $data['name']['en'],
                        'ru' => $data['name']['ru']
                    ],
                    'description' => [
                        'en' => $data['description']['en'] ?? null,
                        'ru' => $data['description']['ru'] ?? null
                    ],
                ]
            );
    }
}
