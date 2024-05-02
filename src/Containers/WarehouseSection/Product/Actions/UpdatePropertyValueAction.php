<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\EditPropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdatePropertyValueAction extends Action
{
    public function handle(array $data)
    {
        $propertyValue = app(EditPropertyValueByIdTask::class)->execute(
            $data['id'],
            [
                'value' => [
                    'ru' => $data['value']['ru'],
                    'en' => $data['value']['en'],
                ]
            ]
        );

        return $propertyValue;
    }
}
