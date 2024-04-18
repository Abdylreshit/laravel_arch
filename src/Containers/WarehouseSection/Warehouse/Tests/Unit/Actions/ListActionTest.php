<?php

namespace App\Containers\WarehouseSection\Warehouse\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Warehouse\Actions\ListAction;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tests\Unit\UnitTestCase;
use Illuminate\Contracts\Pagination\Paginator;

class ListActionTest extends UnitTestCase
{
    public function testMeasurementUnitListAction()
    {
        Warehouse::factory()->count(10)->create();

        $warehouses = ListAction::run();

        $this->assertInstanceOf(Paginator::class, $warehouses);
    }
}
