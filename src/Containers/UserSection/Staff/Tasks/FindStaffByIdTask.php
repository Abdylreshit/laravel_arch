<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindStaffByIdTask extends Task
{
    public function execute($id)
    {
        return Staff::query()->findOrFail($id);
    }
}
