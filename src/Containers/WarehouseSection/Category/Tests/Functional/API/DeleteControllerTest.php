<?php

namespace App\Containers\WarehouseSection\Category\Tests\Functional\API;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Category\Tests\Functional\ApiTestCase;

class DeleteControllerTest extends ApiTestCase
{
    public function testDeleteController()
    {
        $data = Category::factory()->createOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->deleteJson('api/v1/admin/category/'.$data->id.'/delete');

        $request->assertNoContent();
        $this->assertSoftDeleted(Category::class, ['id' => $data->id]);
    }
}
