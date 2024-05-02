<?php

namespace App\Containers\WarehouseSection\Supplier\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Supplier\Actions\DeleteAction;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Containers\WarehouseSection\Supplier\Tests\Unit\UnitTestCase;

class SupplierDeleteActionTest extends UnitTestCase
{
    public function testDeleteByidAction()
    {
        $supplier = Supplier::factory()->createOne();

        DeleteAction::run($supplier->id);

        $this->assertSoftDeleted(Supplier::class, ['id' => $supplier->id]);
    }
}
