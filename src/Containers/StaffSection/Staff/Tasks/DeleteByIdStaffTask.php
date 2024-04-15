<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteByIdStaffTask extends Task
{
    public function execute($id): void
    {
        $staff = Staff::query()->findOrFail($id);
        $staff->delete();
    }
}
