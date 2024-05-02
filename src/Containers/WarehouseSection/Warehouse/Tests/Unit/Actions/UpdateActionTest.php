<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\UpdateAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class UpdateActionTest extends UnitTestCase
{
    public function testEditByIdMeasurementUnitTask()
    {
        $data = Warehouse::factory()->createOne();
        $editData = Warehouse::factory()->makeOne();

        $warehouse = UpdateAction::run(array_merge($editData->toArray(), ['id' => $data->id]));

        $this->assertTrue($data->id == $warehouse->id);
    }
}
