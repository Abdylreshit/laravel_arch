<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\CreatePropertyValueTask;
use App\Containers\WarehouseSection\EAV\Tasks\FindPropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreatePropertyValueAction extends Action
{
    public function handle(array $data)
    {
        $property = app(FindPropertyByIdTask::class)->execute($data['property_id']);

        $propertyValue = app(CreatePropertyValueTask::class)->execute(
            $property,
            [
                'name' => [
                    'ru' => $data['name']['ru'] ?? null,
                    'en' => $data['name']['en'] ?? null,
                ],
                'value' => $data['value'] ?? null,
            ]);

        return $propertyValue;
    }
}
