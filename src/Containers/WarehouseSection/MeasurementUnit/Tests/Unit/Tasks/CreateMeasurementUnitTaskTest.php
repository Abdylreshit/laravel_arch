<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\CreateMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class CreateMeasurementUnitTaskTest extends UnitTestCase
{
    public function testCreateMeasurementUnit()
    {
        $data = MeasurementUnit::factory()->makeOne();

        $measurementUnit = app(CreateMeasurementUnitTask::class)->execute($data->toArray());

        dd($measurementUnit);

        $this->assertTrue($data->code == $measurementUnit->code);
        $this->assertDatabaseHas(MeasurementUnit::class, ['code' => $measurementUnit->code]);
    }
}
