<?php

namespace App\Containers\UserSection\User\Tests\Unit\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\CreateUserTask;
use App\Containers\UserSection\User\Tests\Unit\UnitTestCase;

class CreateUserTaskTest extends UnitTestCase
{
    public function testCreateUser()
    {
        $data = User::factory()->makeOne();

        $user = app(CreateUserTask::class)->execute($data->toArray());

        $this->assertTrue($data->email == $user->email);
        $this->assertDatabaseHas(User::class, ['email' => $user->email]);
    }
}
