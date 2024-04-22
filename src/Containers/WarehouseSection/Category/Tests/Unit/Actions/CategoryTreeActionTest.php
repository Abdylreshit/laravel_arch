<?php

namespace App\Containers\WarehouseSection\Category\Tests\Unit\Actions;

use App\Containers\WarehouseSection\Category\Actions\TreeAction;
use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Category\Tests\Unit\UnitTestCase;

class CategoryTreeActionTest extends UnitTestCase
{
    public function testTreeListAction()
    {
        Category::factory()->count(10)->create();

        TreeAction::run();

        $this->assertTrue(true);
    }
}
