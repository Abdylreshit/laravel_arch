<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Tasks\EditWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\UpdateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateAction extends Action
{
    public function handle(UpdateRequest $request)
    {
        return app(EditWarehouseByIdTask::class)
            ->execute(
                $request->id,
                $request->only(
                    [
                        'name',
                        'is_blocked'
                    ]
                )
            );
    }
}
