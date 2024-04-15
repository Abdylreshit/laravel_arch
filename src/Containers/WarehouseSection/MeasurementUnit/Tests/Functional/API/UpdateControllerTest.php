<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\API;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\ApiTestCase;

class UpdateControllerTest extends ApiTestCase
{
    public function testUpdateController()
    {
        $data = MeasurementUnit::factory()->makeOne();
        $updateData = MeasurementUnit::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->json('PUT', "api/v1/admin/measurement_unit/{$updateData->id}/update", $data->toArray());

        $request->assertOk();
        $this->assertTrue($request->json('measurement_unit.id') === $updateData->id);
        $request->assertJsonStructure(
            [
                'measurement_unit' => [
                    'id',
                    'code',
                    'name',
                    'description',
                    'symbol',
                    'type',
                    'created_at',
                    'updated_at',
                ],
            ]);

        $this->assertTrue($request->json('measurement_unit.symbol') === $data->symbol);
    }
}
