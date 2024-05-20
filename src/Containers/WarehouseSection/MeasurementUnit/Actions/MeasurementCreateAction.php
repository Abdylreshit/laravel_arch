<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\CreateMeasurementTask;
use App\Ship\Core\Abstracts\Actions\Action;

class MeasurementCreateAction extends Action
{
    public function handle(array $data)
    {
        return app(CreateMeasurementTask::class)->execute([
            'name' => [
                'ru' => $data['name']['ru'],
                'en' => $data['name']['en'],
            ],
            'description' => [
                'ru' => $data['description']['ru'] ?? null,
                'en' => $data['description']['en'] ?? null,
            ],
        ]);
    }
}
