<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\UpdateAction;
use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\UpdateRequest;

class UpdateActionTest extends UnitTestCase
{
    public function testEditByIdMeasurementUnitTask()
    {
        $data = MeasurementUnit::factory()->createOne();
        $editData = MeasurementUnit::factory()->makeOne();

        $request = new UpdateRequest(array_merge($editData->toArray(), ['id' => $data->id]));

        $measurementUnit = UpdateAction::run($request);

        $this->assertTrue($data->id == $measurementUnit->id);
    }
}
