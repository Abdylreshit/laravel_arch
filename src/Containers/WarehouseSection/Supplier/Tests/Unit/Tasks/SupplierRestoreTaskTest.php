<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tasks\RestoreSupplierByIdTask;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class SupplierRestoreTaskTest extends UnitTestCase
{
    public function testSupplierRestoreById()
    {
        $supplier = Supplier::factory()->createOne();
        $supplier->delete();

        $supplierRestore = app(RestoreSupplierByIdTask::class)->execute($supplier->id);

        $this->assertTrue($supplierRestore->trashed() == false);
    }
}
