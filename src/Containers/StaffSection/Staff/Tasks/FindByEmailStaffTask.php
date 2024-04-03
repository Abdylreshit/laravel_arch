<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Model;

class FindByEmailStaffTask extends Task
{
    /**
     * @param $email
     * @return Model
     */
    public function execute($email): Model
    {
        return Staff::query()->where('email', $email)->firstOrFail();
    }
}
