<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\CreateAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class CreateActionTest extends UnitTestCase
{
    public function testCreateWarehouseAction()
    {
        $data = Warehouse::factory()->makeOne();

        $warehouse = CreateAction::run($data->toArray());

        $this->assertTrue($data->name == $warehouse->name);
        $this->assertDatabaseHas(Warehouse::class, ['name' => $data->name]);
    }
}
