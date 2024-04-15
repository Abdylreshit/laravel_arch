<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Models\UserModel;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditByIdStaffTask extends Task
{
    /**
     * @throws ResourceException
     */
    public function execute($id, array $data): UserModel
    {
        $staff = Staff::query()->findOrFail($id);

        try {
            $staff->update($data);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $staff;
    }
}
