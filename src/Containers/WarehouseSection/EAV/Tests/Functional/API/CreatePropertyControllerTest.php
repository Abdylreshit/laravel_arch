<?php

namespace App\Containers\WarehouseSection\EAV\Tests\Functional\API;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Tests\Functional\ApiTestCase;

class CreatePropertyControllerTest extends ApiTestCase
{
    public function testCreatePropertyController(): void
    {
        $data = Property::factory()->makeOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->postJson('api/v1/admin/property/create', $data->toArray());

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'property' => [
                    'id',
                    'name',
                    'code',
                    'type',
                ],
            ]);
    }
}
