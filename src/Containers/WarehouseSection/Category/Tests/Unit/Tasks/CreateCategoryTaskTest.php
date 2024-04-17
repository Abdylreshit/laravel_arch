<?php

namespace App\Containers\WarehouseSection\Category\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Containers\WarehouseSection\Category\Tests\Unit\UnitTestCase;

class CreateCategoryTaskTest extends UnitTestCase
{
    public function testCategoryCreate()
    {
        $data = Category::factory()->makeOne();

        $category = app(CreateCategoryTask::class)->execute($data->toArray());

        $this->assertTrue($data->slug == $category->slug);
        $this->assertDatabaseHas(Category::class, ['slug' => $category->slug]);
    }
}
