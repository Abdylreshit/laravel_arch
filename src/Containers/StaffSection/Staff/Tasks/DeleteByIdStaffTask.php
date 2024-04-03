<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Model;

class DeleteByIdStaffTask extends Task
{
    /**
     * @param $id
     * @return Model
     */
    public function execute($id): Model
    {
        $staff = Staff::query()->findOrFail($id);
        $staff->delete();

        return $staff;
    }
}
