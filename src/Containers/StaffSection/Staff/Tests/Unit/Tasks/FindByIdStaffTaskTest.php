<?php

namespace App\Containers\StaffSection\Staff\Tests\Unit\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Containers\StaffSection\Staff\Tasks\FindByIdStaffTask;
use App\Containers\StaffSection\Staff\Tests\Unit\UnitTestCase;

class FindByIdStaffTaskTest extends UnitTestCase
{
    public function testFindByIdStaff()
    {
        $data = Staff::factory()->createOne();

        $staff = app(FindByIdStaffTask::class)->execute($data->id);

        $this->assertTrue($data->id == $staff->id && $staff->email == $data->email);
    }
}
