<?php

namespace App\Containers\WarehouseSection\EAV\Tests\Functional\API;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Containers\WarehouseSection\EAV\Tests\Functional\ApiTestCase;

class DeletePropertyValueControllerTest extends ApiTestCase
{
    public function testDeletePropertyValueController(): void
    {
        $property = Property::factory()->createOne();
        $propertyValue = PropertyValue::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->deleteJson('api/v1/admin/property/value/' . $propertyValue->id . '/delete');

        $request->assertNoContent();
    }
}
