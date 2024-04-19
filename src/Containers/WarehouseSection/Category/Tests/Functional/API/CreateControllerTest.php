<?php

namespace App\Containers\WarehouseSection\Category\Tests\Functional\API;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Category\Tests\Functional\ApiTestCase;

class CreateControllerTest extends ApiTestCase
{
    public function testCategoryCreateController()
    {
        $data = Category::factory()->makeOne();

        $request = $this
            ->withToken($this->getStaffToken())
            ->postJson('api/v1/admin/category/create', $data->toArray());

        $request->assertOk();
        $request->assertJsonStructure(
            [
                "category" => [
                    "id",
                    "name",
                    "description",
                    "slug",
                    "parent_id",
                    "priority",
                ],
            ]);
    }
}
