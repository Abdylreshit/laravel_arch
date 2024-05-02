<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\CreatePropertyTask;
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
        ]);

        return $property;
    }
}
