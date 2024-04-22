<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Tasks\EditWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\UpdateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateAction extends Action
{
    public function handle(array $data)
    {
        return app(EditWarehouseByIdTask::class)
            ->execute(
                $data['id'],
                [
                    'name' => $data['name'],
                    'is_blocked' => $data['is_blocked']
                ]
            );
    }
}
