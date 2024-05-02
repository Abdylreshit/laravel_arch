<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Tasks\CreateWarehouseTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateAction extends Action
{
    public function handle(array $data)
    {
        return app(CreateWarehouseTask::class)->execute([
            'name' => $data['name'],
            'is_blocked' => $data['is_blocked'],
        ]);
    }
}
