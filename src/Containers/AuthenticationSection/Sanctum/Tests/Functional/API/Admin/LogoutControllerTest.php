<?php

namespace App\Containers\AuthenticationSection\Sanctum\Tests\Functional\API\Admin;

use App\Containers\AuthenticationSection\Sanctum\Tests\Functional\ApiTestCase;

class LogoutControllerTest extends ApiTestCase
{
    public function testStaffLogoutControllerValidToken()
    {
        $request = $this->withToken($this->getStaffToken())
            ->postJson('api/v1/admin/logout');

        $request->assertStatus(202);
    }

    public function testStaffLogoutControllerInValidToken()
    {
        $request = $this->withToken('123123')
            ->postJson('api/v1/admin/logout');

        $request->assertStatus(401);
        $request->assertJsonStructure([
            'error',
            'message',
            'container',
            'data',
        ]);
    }
}
