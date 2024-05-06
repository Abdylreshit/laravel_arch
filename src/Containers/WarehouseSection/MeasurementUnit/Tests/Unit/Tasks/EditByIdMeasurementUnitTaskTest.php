<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\EditByIdMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class EditByIdMeasurementUnitTaskTest extends UnitTestCase
{
    public function testEditByIdMeasurementUnitTask()
    {
        $data = MeasurementUnit::factory()->createOne();
        $editData = MeasurementUnit::factory()->makeOne();

        $measurementUnit = app(EditByIdMeasurementUnitTask::class)->execute($data->id, $editData->toArray());

        $this->assertTrue($data->id == $measurementUnit->id);
    }
}
