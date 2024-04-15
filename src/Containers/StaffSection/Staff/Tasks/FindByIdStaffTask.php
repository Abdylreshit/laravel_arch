<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindByIdStaffTask extends Task
{
    public function execute($id)
    {
        return Staff::query()->findOrFail($id);
    }
}
