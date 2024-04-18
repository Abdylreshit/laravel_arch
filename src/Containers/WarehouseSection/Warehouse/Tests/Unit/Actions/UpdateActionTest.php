<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\UpdateAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\UpdateRequest;

class UpdateActionTest extends UnitTestCase
{
    public function testEditByIdMeasurementUnitTask()
    {
        $data = Warehouse::factory()->createOne();
        $editData = Warehouse::factory()->makeOne();

        $request = new UpdateRequest(array_merge($editData->toArray(), ['id' => $data->id]));

        $warehouse = UpdateAction::run($request);

        $this->assertTrue($data->id == $warehouse->id);
    }
}
