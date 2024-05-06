<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\EditPropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdatePropertyAction extends Action
{
    public function handle(array $data)
    {
        $property = app(EditPropertyByIdTask::class)->execute(
            $data['id'],
            [
                'name' => [
                    'ru' => $data['name']['ru'],
                    'en' => $data['name']['en'],
                ],
                'type' => $data['type']
            ]
        );

        return $property;
    }
}
