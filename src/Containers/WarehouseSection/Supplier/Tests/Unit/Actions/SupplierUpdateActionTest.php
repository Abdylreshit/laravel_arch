<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Supplier\Actions\UpdateAction;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class SupplierUpdateActionTest extends UnitTestCase
{
    public function testUpdateAction()
    {
        $supplier = Supplier::factory()->createOne();
        $data = Supplier::factory()->makeOne();

        $supplierUpdate = UpdateAction::run([
            'id' => $supplier->id,
            'email' => $data->email,
            'name' => $data->name,
        ]);

        $this->assertTrue($data->email == $supplierUpdate->email);
    }
}
