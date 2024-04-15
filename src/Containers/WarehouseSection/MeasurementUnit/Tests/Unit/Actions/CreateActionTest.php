<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\CreateAction;
use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\CreateRequest;

class CreateActionTest extends UnitTestCase
{
    public function testCreateMeasurementUnitAction()
    {
        $data = MeasurementUnit::factory()->makeOne();

        $request = new CreateRequest($data->toArray());

        $measurementUnit = CreateAction::run($request);

        $this->assertTrue($data->code == $measurementUnit->code);
        $this->assertDatabaseHas(MeasurementUnit::class, ['code' => $data->code]);
    }
}
