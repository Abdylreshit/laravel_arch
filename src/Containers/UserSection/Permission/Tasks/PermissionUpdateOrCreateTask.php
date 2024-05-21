<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class PermissionUpdateOrCreateTask extends Task
{
    public function execute(array $keys, array $data): void
    {
        try {
            Permission::query()->updateOrCreate($keys, $data);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }
    }
}
