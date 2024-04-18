<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\FindAction;
use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class FindActionTest extends UnitTestCase
{
    public function testFindMeasurementUnitAction()
    {
        $data = MeasurementUnit::factory()->createOne();

        $measurementUnit = FindAction::run($data->id);

        $this->assertTrue($data->id == $measurementUnit->id && $measurementUnit->code == $data->code);
    }
}
