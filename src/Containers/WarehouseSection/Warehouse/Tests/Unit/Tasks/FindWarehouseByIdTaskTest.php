<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\FindWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class FindWarehouseByIdTaskTest extends UnitTestCase
{
    public function testFindByIdWarehouse()
    {
        $data = Warehouse::factory()->createOne();

        $warehouse = app(FindWarehouseByIdTask::class)->execute($data->id);

        $this->assertTrue($data->id == $warehouse->id);
    }
}
