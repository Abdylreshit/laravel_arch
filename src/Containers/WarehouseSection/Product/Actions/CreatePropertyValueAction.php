<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\CreatePropertyTask;
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
                'value' => [
                    'ru' => $data['value']['ru'],
                    'en' => $data['value']['en'],
                ]
            ]);

        return $propertyValue;
    }
}
