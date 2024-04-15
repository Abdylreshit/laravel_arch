<?php

namespace App\Containers\StaffSection\Permission\Tasks;

use App\Containers\StaffSection\Permission\Models\Permission;
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
