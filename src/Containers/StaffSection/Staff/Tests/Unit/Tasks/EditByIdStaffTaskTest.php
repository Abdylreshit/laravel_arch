<?php

namespace App\Containers\StaffSection\Staff\Tests\Unit\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Containers\StaffSection\Staff\Tasks\EditByIdStaffTask;
use App\Containers\StaffSection\Staff\Tests\Unit\UnitTestCase;

class EditByIdStaffTaskTest extends UnitTestCase
{
    public function testEditByIdStaff()
    {
        $data = Staff::factory()->createOne();
        $editData = Staff::factory()->makeOne();

        $staff = app(EditByIdStaffTask::class)->execute($data->id, $editData->toArray());

        $this->assertTrue($data->id == $staff->id && $staff->email == $editData->email);
    }
}
