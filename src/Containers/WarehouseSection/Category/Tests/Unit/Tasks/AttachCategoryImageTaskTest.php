<?php

namespace App\Containers\WarehouseSection\Category\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Category\Tasks\AttachCategoryImageTask;
use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Containers\WarehouseSection\Category\Tests\Unit\UnitTestCase;

class AttachCategoryImageTaskTest extends UnitTestCase
{
    public function testAttachCategoryImageTaskTest()
    {
        $category = Category::factory()->createOne();

        app(AttachCategoryImageTask::class)->execute($category, 'https://fakeimg.pl/250x100/');

        $this->assertTrue($category->media->isNotEmpty());
    }
}
