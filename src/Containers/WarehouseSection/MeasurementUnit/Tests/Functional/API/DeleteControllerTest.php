<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\API;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\ApiTestCase;

class DeleteControllerTest extends ApiTestCase
{
    public function testDeleteController()
    {
        $data = MeasurementUnit::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->deleteJson("api/v1/admin/measurement_unit/{$data->id}/delete");

        $request->assertNoContent();
        $this->assertSoftDeleted(MeasurementUnit::class, ['id' => $data->id]);
    }
}
