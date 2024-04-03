<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Database\Eloquent\Model;

class EditByIdStaffTask extends Task
{
    /**
     * @param $id
     * @param array $data
     * @return Model
     * @throws ResourceException
     */
    public function execute($id, array $data): Model
    {
        $staff = Staff::query()->findOrFail($id);

        try {
            $staff->update($data);
        } catch (\Exception){
            throw new ResourceException;
        }

        return $staff;
    }
}
