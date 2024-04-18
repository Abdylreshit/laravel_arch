<?php

namespace App\Containers\UserSection\User\Tests\Unit\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\DeleteUserByIdTask;
use App\Containers\UserSection\User\Tests\Unit\UnitTestCase;

class DeleteUserByIdTaskTest extends UnitTestCase
{
    public function testDeleteUserById()
    {
        $data = User::factory()->createOne();

        app(DeleteUserByIdTask::class)->execute($data->id);

        $this->assertSoftDeleted(User::class, ['email' => $data->email]);
    }
}
