<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\UpdateAction;
use App\Containers\WarehouseSection\Category\UI\API\Requests\UpdateRequest;
use App\Containers\WarehouseSection\Category\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateController extends ApiController
{
    public function __invoke(UpdateRequest $request): JsonResponse
    {
        $category = UpdateAction::run($request);

        return $this->successResponse([
            'category' => new MainResource($category),
        ]);
    }
}
