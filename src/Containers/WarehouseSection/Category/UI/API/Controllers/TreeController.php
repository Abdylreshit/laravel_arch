<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\TreeAction;
use App\Containers\WarehouseSection\Category\UI\API\Resources\TreeResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class TreeController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $categoriesTree = TreeAction::run();

        return $this->successResponse([
            'categories' => TreeResource::collection($categoriesTree),
        ]);
    }
}
