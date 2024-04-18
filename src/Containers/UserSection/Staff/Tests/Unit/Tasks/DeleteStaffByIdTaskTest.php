<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\DeleteStaffByIdTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class DeleteStaffByIdTaskTest extends UnitTestCase
{
    public function testDeleteStaffById()
    {
        $data = Staff::factory()->createOne();

        app(DeleteStaffByIdTask::class)->execute($data->id);

        $this->assertSoftDeleted(Staff::class, ['id' => $data->id]);
    }
}
