<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Supplier\Actions\RestoreAction;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class SupplierRestoreActionTest extends UnitTestCase
{
    public function testRestoreByIdAction()
    {
        $supplier = Supplier::factory()->createOne();
        $supplier->delete();

        $supplierRestore = RestoreAction::run($supplier->id);

        $this->assertTrue($supplierRestore->trashed() == false);
    }
}
