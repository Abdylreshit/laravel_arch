<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\API;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\ApiTestCase;

class CreateControllerTest extends ApiTestCase
{
    public function testListController()
    {
        $data = MeasurementUnit::factory()->makeOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->postJson('api/v1/admin/measurement_unit/create', $data->toArray());

        $request->assertOk();
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
