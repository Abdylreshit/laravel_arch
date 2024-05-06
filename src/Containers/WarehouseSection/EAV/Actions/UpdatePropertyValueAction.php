<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\EditPropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdatePropertyValueAction extends Action
{
    public function handle(array $data)
    {
        $propertyValue = app(EditPropertyValueByIdTask::class)->execute(
            $data['id'],
            [
                'name' => [
                    'ru' => $data['name']['ru'],
                    'en' => $data['name']['en'],
                ],
                'value' => $data['value'],
            ]
        );

        return $propertyValue;
    }
}
