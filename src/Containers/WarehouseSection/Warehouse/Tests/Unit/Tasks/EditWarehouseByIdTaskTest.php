<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\EditWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class EditWarehouseByIdTaskTest extends UnitTestCase
{
    public function testEditWarehouseById()
    {
        $data = Warehouse::factory()->createOne();
        $editData = Warehouse::factory()->makeOne();

        app(EditWarehouseByIdTask::class)->execute($data->id, $editData->toArray());

        $this->assertDatabaseHas(Warehouse::class, ['id' => $data->id, 'name' => $editData->name]);
    }
}
