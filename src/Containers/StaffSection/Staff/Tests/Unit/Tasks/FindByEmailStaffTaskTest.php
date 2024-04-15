<?php

namespace App\Containers\StaffSection\Staff\Tests\Unit\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Containers\StaffSection\Staff\Tasks\FindByEmailStaffTask;
use App\Containers\StaffSection\Staff\Tests\Unit\UnitTestCase;

class FindByEmailStaffTaskTest extends UnitTestCase
{
    public function testFindByEmailStaff()
    {
        $data = Staff::factory()->createOne();

        $staff = app(FindByEmailStaffTask::class)->execute($data->email);

        $this->assertTrue($data->id == $staff->id && $staff->email == $data->email);
    }
}
