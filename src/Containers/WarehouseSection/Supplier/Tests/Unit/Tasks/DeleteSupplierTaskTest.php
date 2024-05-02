<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tasks\DeleteSupplierByIdTask;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class DeleteSupplierTaskTest extends UnitTestCase
{
    public function testSupplierDeleteById()
    {
        $supplier = Supplier::factory()->createOne();

        app(DeleteSupplierByIdTask::class)->execute($supplier->id);

        $this->assertSoftDeleted(Supplier::class, ['id' => $supplier->id]);
    }
}
