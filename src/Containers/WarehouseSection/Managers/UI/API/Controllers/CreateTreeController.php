<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class CreateTreeController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'model' => 'required|string|in:CATEGORY,WAREHOUSE,REGION',
            'parent_type' => 'required|string|in:CATEGORY,WAREHOUSE,REGION',
            'parent_id' => 'nullable|integer',
        ]);

        $manager = getMenuManager();

        $manager->createTree($request->all());

        return $this->accepted('ok');
    }
}
