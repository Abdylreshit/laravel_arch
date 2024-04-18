<?php

namespace App\Containers\AuthenticationSection\Sanctum\Tests\Functional\API\Admin;

use App\Containers\AuthenticationSection\Sanctum\Tests\Functional\ApiTestCase;
use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\CreateStaffTask;

class LoginControllerTest extends ApiTestCase
{
    public function testStaffLoginControllerValidData()
    {
        $staff = Staff::factory()->makeOne();
        app(CreateStaffTask::class)->execute($staff->user_id);

        $request = $this->postJson('api/v1/admin/login', [
            'email' => $staff->email,
            'password' => '123123',
        ]);

        $request->assertOk();
        $request->assertJsonStructure([
            'access_token',
            'staff' => [
                'id',
                'email',
                'firstname',
                'lastname',
            ],
        ]);
    }

    public function testStaffLoginControllerInValidData()
    {
        $staff = Staff::factory()->makeOne();

        $request = $this->postJson('api/v1/admin/login', [
            'email' => $staff->email,
        ]);

        $request->assertStatus(422);
        $request->assertJsonStructure([
            'error',
            'message',
            'container',
            'data',
        ]);
    }

    public function testStaffLoginControllerNotRegisteredStaff()
    {
        $staff = Staff::factory()->makeOne();

        $request = $this->postJson('api/v1/admin/login', [
            'email' => $staff->email,
            'password' => '123123',
        ]);

        $request->assertStatus(404);
        $request->assertJsonStructure([
            'error',
            'message',
            'container',
            'data',
        ]);
    }
}
