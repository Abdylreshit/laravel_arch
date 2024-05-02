<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\FindAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;

class FindActionTest extends UnitTestCase
{
    public function testFindWarehouseAction()
    {
        $data = Warehouse::factory()->createOne();

        $warehouse = FindAction::run($data->id);

        $this->assertTrue($data->id == $warehouse->id && $warehouse->code == $data->code);
    }
}
