<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\DeleteWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class DeleteWarehouseByIdTaskTest extends UnitTestCase
{
    public function testDeleteWarehouseById()
    {
        $data = Warehouse::factory()->createOne();

        app(DeleteWarehouseByIdTask::class)->execute($data->id);

        $this->assertSoftDeleted(Warehouse::class, ['id' => $data->id]);
    }
}
