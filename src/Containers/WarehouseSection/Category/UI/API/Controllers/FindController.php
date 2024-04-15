<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\FindAction;
use App\Containers\WarehouseSection\Category\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class FindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $category = FindAction::run($request->id);

        return $this->successResponse([
            'category' => new MainResource($category),
        ]);
    }
}
