<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\DeleteAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class DeleteActionTest extends UnitTestCase
{
    public function testDeleteWarehouseAction()
    {
        $data = Warehouse::factory()->createOne();

        DeleteAction::run($data->id);

        $this->assertSoftDeleted(Warehouse::class, ['id' => $data->id]);
    }
}
