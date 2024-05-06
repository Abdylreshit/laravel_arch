<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\CreatePropertyTask;
use App\Containers\WarehouseSection\EAV\Tasks\CreatePropertyValueTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreatePropertyAction extends Action
{
    public function handle(array $data)
    {
        $property = app(CreatePropertyTask::class)->execute([
            'name' => [
                'ru' => $data['name']['ru'],
                'en' => $data['name']['en'],
            ],
            'type' => $data['type'],
        ]);

        if ($property->isBoolean()){
            app(CreatePropertyValueTask::class)->execute([
                $property,
                [
                    'name' => [
                        'ru' => 'Включено',
                        'en' => 'On',
                    ],
                    'value' => 1,
                ]
            ]);
            app(CreatePropertyValueTask::class)->execute([
                $property,
                [
                    'name' => [
                        'ru' => 'Выключено',
                        'en' => 'Off',
                    ],
                    'value' => 0,
                ]
            ]);
        }

        return $property;
    }
}
