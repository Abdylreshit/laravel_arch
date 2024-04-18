<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\CreateAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\CreateRequest;

class CreateActionTest extends UnitTestCase
{
    public function testCreateWarehouseAction()
    {
        $data = Warehouse::factory()->makeOne();

        $request = new CreateRequest($data->toArray());

        $warehouse = CreateAction::run($request);

        $this->assertTrue($data->name == $warehouse->name);
        $this->assertDatabaseHas(Warehouse::class, ['name' => $data->name]);
    }
}
