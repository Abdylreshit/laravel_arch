<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteStaffByIdTask extends Task
{
    public function execute($id): void
    {
        $staff = Staff::query()->findOrFail($id);
        $staff->delete();
    }
}
