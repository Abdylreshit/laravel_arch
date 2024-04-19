<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\CreateAction;
use App\Containers\WarehouseSection\Category\UI\API\Requests\CreateRequest;
use App\Containers\WarehouseSection\Category\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateController extends ApiController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        $category = CreateAction::run($request->toArray());

        return $this->successResponse([
            'category' => new MainResource($category),
        ]);
    }
}
