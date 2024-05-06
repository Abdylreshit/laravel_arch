<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\CreatePropertyValueTask;
use App\Containers\WarehouseSection\Product\Tasks\FindPropertyByIdTask;
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
                    'ru' => $data['name']['ru'],
                    'en' => $data['name']['en'],
                ],
                'value' => $data['value'] ?? null,
            ]);

        return $propertyValue;
    }
}
