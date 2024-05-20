<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\MeasurementDeleteAction;
use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class DeleteActionTest extends UnitTestCase
{
    public function testDeleteMeasurementUnitAction()
    {
        $data = MeasurementUnit::factory()->createOne();

        MeasurementDeleteAction::run($data->id);

        $this->assertSoftDeleted(MeasurementUnit::class, ['id' => $data->id]);
    }
}
