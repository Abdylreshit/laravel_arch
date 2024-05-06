<?php

namespace App\Containers\WarehouseSection\EAV\Tests\Functional\API;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Containers\WarehouseSection\EAV\Tests\Functional\ApiTestCase;

class FindPropertyValueControllerTest extends ApiTestCase
{
    public function testFindPropertyValueController(): void
    {
        $property = Property::factory()->createOne();
        $propertyValue = PropertyValue::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->getJson('api/v1/admin/property/value/' . $propertyValue->id . '/find');

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'property_value' => [
                    'id',
                    'name',
                    'value',
                ],
            ]);
    }
}
