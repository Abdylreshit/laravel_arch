<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Tasks\RoleRestoreByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RoleRestoreAction extends Action
{
    public function handle($roleId)
    {
        $role = app(RoleRestoreByIdTask::class)->execute($roleId);

        $role->load('permissions');

        return $role;
    }
}
