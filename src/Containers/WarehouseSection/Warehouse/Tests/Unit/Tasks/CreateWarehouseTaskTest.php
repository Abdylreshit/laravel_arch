<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\CreateWarehouseTask;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class CreateWarehouseTaskTest extends UnitTestCase
{
    public function testCreateWarehouse()
    {
        $data = Warehouse::factory()->makeOne();

        $warehouse = app(CreateWarehouseTask::class)->execute($data->toArray());

        $this->assertTrue($data->name == $warehouse->name);
        $this->assertDatabaseHas(Warehouse::class, ['name' => $warehouse->name]);
    }
}
