<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\EditStaffByIdTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class EditStaffByIdTaskTest extends UnitTestCase
{
    public function testEditStaffById()
    {
        $data = Staff::factory()->createOne();
        //        $editData = Staff::factory()->makeOne();

        $staff = app(EditStaffByIdTask::class)->execute($data->id);

        $this->assertTrue($data->id == $staff->id);
    }
}
