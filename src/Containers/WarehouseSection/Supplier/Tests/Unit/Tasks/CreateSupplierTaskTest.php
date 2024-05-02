<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tasks\CreateSupplierTask;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class CreateSupplierTaskTest extends UnitTestCase
{
    public function testSupplierCreate()
    {
        $data = Supplier::factory()->makeOne();

        $supplier = app(CreateSupplierTask::class)->execute($data->toArray());

        $this->assertTrue($data->email == $supplier->email);
        $this->assertDatabaseHas(Supplier::class, ['email' => $supplier->email]);
    }
}
