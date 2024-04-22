<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\MoveAction;
use App\Containers\WarehouseSection\Category\UI\API\Requests\MoveRequest;
use App\Containers\WarehouseSection\Category\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MoveController extends ApiController
{
    public function __invoke(MoveRequest $request): JsonResponse
    {
        $category = MoveAction::run($request->all());

        return $this->successResponse([
            'category' => new MainResource($category),
        ]);
    }
}
