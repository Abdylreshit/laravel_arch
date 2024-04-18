<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Database\Eloquent\Model;

class PermissionCreateTask extends Task
{
    /**
     * @throws ResourceException
     */
    public function execute(array $data): Model
    {
        try {
            $permission = Permission::query()->create($data);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $permission;
    }
}
