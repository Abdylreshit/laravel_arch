<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tasks\EditSupplierByIdTask;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class UpdateSupplierTaskTest extends UnitTestCase
{
    public function testSupplierUpdateById()
    {
        $supplier = Supplier::factory()->createOne();
        $data = Supplier::factory()->makeOne();

        $supplierEdit = app(EditSupplierByIdTask::class)->execute($supplier->id, $data->toArray());

        $this->assertTrue($data->email == $supplierEdit->email);
    }
}
