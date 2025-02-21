<?php

namespace App\Containers\AuthenticationSection\Sanctum\Tests\Unit\Admin\Actions;

use App\Containers\AuthenticationSection\Sanctum\Actions\Admin\LoginAction;
use App\Containers\AuthenticationSection\Sanctum\Tests\Unit\UnitTestCase;
use App\Containers\UserSection\Staff\Models\Staff;
use Laravel\Sanctum\PersonalAccessToken;

class LoginActionTest extends UnitTestCase
{
    public function testStaffLoginAction()
    {
        $staff = Staff::factory()->createOne();

        $response = LoginAction::run([
            'email' => $staff->email,
            'password' => '123123',
        ]);

        $this->assertTrue(PersonalAccessToken::where('tokenable_id', $staff->id)->exists());
        $this->assertTrue($response->staff->email == $staff->email);
    }
}
