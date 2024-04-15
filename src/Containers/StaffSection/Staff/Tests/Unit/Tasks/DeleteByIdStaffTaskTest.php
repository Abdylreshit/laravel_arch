<?php

namespace App\Containers\StaffSection\Staff\Tests\Unit\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Containers\StaffSection\Staff\Tasks\DeleteByIdStaffTask;
use App\Containers\StaffSection\Staff\Tests\Unit\UnitTestCase;

class DeleteByIdStaffTaskTest extends UnitTestCase
{
    public function testDeleteByIdStaff()
    {
        $data = Staff::factory()->createOne();

        app(DeleteByIdStaffTask::class)->execute($data->id);

        $this->assertSoftDeleted(Staff::class, ['email' => $data->email]);
    }
}
