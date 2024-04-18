<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Controllers;

use App\Containers\WarehouseSection\Warehouse\Actions\UpdateAction;
use App\Containers\WarehouseSection\Warehouse\UI\API\Requests\UpdateRequest;
use App\Containers\WarehouseSection\Warehouse\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateController extends ApiController
{
    public function __invoke(UpdateRequest $request): JsonResponse
    {
        $warehouse = UpdateAction::run($request);

        return $this->successResponse([
            'warehouse' => new MainResource($warehouse),
        ]);
    }
}
