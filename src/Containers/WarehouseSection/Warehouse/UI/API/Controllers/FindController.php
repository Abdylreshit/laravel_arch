<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Controllers;

use App\Containers\WarehouseSection\Warehouse\Actions\FindAction;
use App\Containers\WarehouseSection\Warehouse\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class FindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $warehouse = FindAction::run($request->id);

        return $this->successResponse([
            'warehouse' => new MainResource($warehouse),
        ]);
    }
}
