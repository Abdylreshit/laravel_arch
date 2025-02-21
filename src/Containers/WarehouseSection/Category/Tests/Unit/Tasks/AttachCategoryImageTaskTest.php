<?php

namespace App\Containers\WarehouseSection\Category\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Category\Tasks\AttachCategoryImageTask;
use App\Containers\WarehouseSection\Category\Tests\Unit\UnitTestCase;
use Illuminate\Http\UploadedFile;

class AttachCategoryImageTaskTest extends UnitTestCase
{
    public function testAttachCategoryImageTaskTest()
    {
        $category = Category::factory()->createOne();

        app(AttachCategoryImageTask::class)->execute($category, 'https://fakeimg.pl/250x100/');

        $this->assertTrue($category->media->isNotEmpty());

        $image = UploadedFile::fake()->image('avatar.jpg', 50, 50)->size(100);

        app(AttachCategoryImageTask::class)->execute($category, $image);

        $this->assertTrue($category->media->isNotEmpty());
    }
}
