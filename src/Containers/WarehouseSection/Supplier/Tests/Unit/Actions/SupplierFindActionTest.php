<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Supplier\Actions\FindAction;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class SupplierFindActionTest extends UnitTestCase
{
    public function testFindByIdAction()
    {
        $supplier = Supplier::factory()->createOne();

        $supplierFind = FindAction::run($supplier->id);

        $this->assertTrue($supplier->email == $supplierFind->email);
    }
}
