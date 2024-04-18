<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;

class PermissionUpdateOrCreateTask extends Task
{
    public function execute(array $data): void
    {
        Permission::query()->updateOrCreate($data, $data);
    }
}
