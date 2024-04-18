<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\ListAction;
use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;
use Illuminate\Contracts\Pagination\Paginator;

class ListActionTest extends UnitTestCase
{
    public function testMeasurementUnitListAction()
    {
        MeasurementUnit::factory()->count(10)->create();

        $measurementUnits = ListAction::run();

        $this->assertInstanceOf(Paginator::class, $measurementUnits);
    }
}
