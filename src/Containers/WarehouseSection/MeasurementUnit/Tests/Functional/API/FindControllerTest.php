<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\API;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\ApiTestCase;

class FindControllerTest extends ApiTestCase
{
    public function testListController()
    {
        $data = MeasurementUnit::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->json('GET', "api/v1/admin/measurement_unit/{$data->id}/find");

        $request->assertOk();
        $this->assertTrue($request->json('measurement_unit.id') === $data->id);
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
    }
}
