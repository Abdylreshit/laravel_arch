<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Controllers;

use App\Containers\WarehouseSection\Warehouse\Actions\CreateAction;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\CreateRequest;
use App\Containers\WarehouseSection\Warehouse\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateController extends ApiController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        $warehouse = CreateAction::run($request);

        return $this->successResponse([
            'warehouse' => new MainResource($warehouse),
        ]);
    }
}
