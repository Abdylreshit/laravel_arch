<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tasks\FindSupplierByIdTask;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class FindSupplierTaskTest extends UnitTestCase
{
    public function testSupplierFindById()
    {
        $supplier = Supplier::factory()->createOne();

        $supplierFind = app(FindSupplierByIdTask::class)->execute($supplier->id);

        $this->assertTrue($supplier->email == $supplierFind->email);
    }
}
