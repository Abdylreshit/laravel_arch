<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\DeleteByIdCategoryTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeleteAction extends Action
{
    public function handle($id)
    {
        app(DeleteByIdCategoryTask::class)->execute($id);
    }
}
