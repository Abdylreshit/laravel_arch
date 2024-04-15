<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\DeleteByIdMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class DeleteByIdMeasurementUnitTaskTest extends UnitTestCase
{
    public function testDeleteMeasurementUnit()
    {
        $data = MeasurementUnit::factory()->createOne();

        app(DeleteByIdMeasurementUnitTask::class)->execute($data->id);

        $this->assertSoftDeleted(MeasurementUnit::class, ['code' => $data->code]);
    }
}
