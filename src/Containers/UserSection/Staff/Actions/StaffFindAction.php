<?php

namespace App\Containers\UserSection\Staff\Actions;

use App\Containers\UserSection\Staff\Tasks\FindStaffByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class StaffFindAction extends Action
{
    public function handle($staffId)
    {
        $staff = app(FindStaffByIdTask::class)->execute($staffId);

        $staff->load('user');
        $staff->load('roles');
        $staff->load('permissions');
        $staff->load('media');

        return $staff;
    }
}
