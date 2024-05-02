<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Supplier\Actions\CreateAction;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class SupplierCreateActionTest extends UnitTestCase
{
    public function testCreateAction()
    {
        $data = Supplier::factory()->makeOne();

        $supplier = CreateAction::run($data->toArray());

        $this->assertTrue($data->email == $supplier->email);
        $this->assertDatabaseHas(Supplier::class, ['email' => $supplier->email]);
    }
}
