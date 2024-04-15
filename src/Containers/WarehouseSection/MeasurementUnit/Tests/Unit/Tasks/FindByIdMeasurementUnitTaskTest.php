<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\FindByIdMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class FindByIdMeasurementUnitTaskTest extends UnitTestCase
{
    public function testFindByIdMeasurementUnit()
    {
        $data = MeasurementUnit::factory()->createOne();

        $measurementUnit = app(FindByIdMeasurementUnitTask::class)->execute($data->id);

        $this->assertTrue($data->id == $measurementUnit->id && $measurementUnit->code == $data->code);
    }
}
