<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindByEmailStaffTask extends Task
{
    public function execute($email)
    {
        return Staff::query()->where('email', $email)->firstOrFail();
    }
}
