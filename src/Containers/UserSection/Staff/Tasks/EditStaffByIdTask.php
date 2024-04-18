<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditStaffByIdTask extends Task
{
    public function execute($id, array|null $data = null)
    {
        $staff = Staff::query()->findOrFail($id);

        try {
            $staff->refresh();
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $staff;
    }
}
