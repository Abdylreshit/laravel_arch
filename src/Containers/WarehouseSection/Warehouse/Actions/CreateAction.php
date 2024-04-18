<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Tasks\CreateWarehouseTask;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\CreateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateAction extends Action
{
    public function handle(CreateRequest $request)
    {
        return app(CreateWarehouseTask::class)->execute([
            'name' => $request->name,
            'is_blocked' => $request->is_blocked,
        ]);
    }
}
