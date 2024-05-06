<?php

namespace App\Containers\WarehouseSection\EAV\Tests\Functional\API;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Tests\Functional\ApiTestCase;

class CreatePropertyValueControllerTest extends ApiTestCase
{
    public function testCreatePropertyValueController(): void
    {
        $property = Property::factory()->createOne();
        $propertyValue = Property::factory()->makeOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->postJson('api/v1/admin/property/' . $property->id . '/value/create', $propertyValue->toArray());

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'property_value' => [
                    'id',
                    'name',
                    'value'
                ],
            ]);
    }
}
