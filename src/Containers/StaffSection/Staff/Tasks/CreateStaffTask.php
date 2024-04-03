<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Database\Eloquent\Model;

class CreateStaffTask extends Task
{
    /**
     * @param array $data
     * @return Model
     * @throws ResourceException
     */
    public function run(array $data): Model
    {
        try {
            $staff = Staff::query()->create($data);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $staff;
    }
}
