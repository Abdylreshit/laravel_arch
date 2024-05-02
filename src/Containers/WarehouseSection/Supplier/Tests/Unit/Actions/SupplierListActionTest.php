<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Supplier\Actions\ListAction;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;
use Illuminate\Contracts\Pagination\Paginator;

class SupplierListActionTest extends UnitTestCase
{
    public function testListActionWithPagination()
    {
        Supplier::factory()->count(10)->create();

        $suppliers = ListAction::run();

        $this->assertInstanceOf(Paginator::class, $suppliers);
    }
}
