<?php

namespace App\Containers\WarehouseSection\EAV\Tests\Functional\API;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Tests\Functional\ApiTestCase;

class DeletePropertyControllerTest extends ApiTestCase
{
    public function testDeletePropertyController(): void
    {
        $property = Property::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->deleteJson('api/v1/admin/property/' . $property->id . '/delete');

        $request->assertNoContent();
    }
}
