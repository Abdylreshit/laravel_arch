<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\FindByIdMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class FindByIdActionTest extends UnitTestCase
{
    public function testFindByIdMeasurementUnit()
    {
        $data = MeasurementUnit::factory()->createOne();

        $measurementUnit = app(FindByIdMeasurementUnitTask::class)->execute($data->id);

        $this->assertTrue($data->id == $measurementUnit->id && $measurementUnit->code == $data->code);
    }
}
