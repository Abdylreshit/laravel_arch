<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Tasks\FindRoleByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RoleFindAction extends Action
{
    public function handle($roleId)
    {
        $role = app(FindRoleByIdTask::class)->execute($roleId);

        $role->load('permissions');

        return $role;
    }
}
