<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Controllers;

use App\Containers\WarehouseSection\Supplier\Actions\RestoreAction;
use App\Containers\WarehouseSection\Supplier\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class RestoreController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $supplier = RestoreAction::run($request->id);

        return $this->successResponse([
            'supplier' => new MainResource($supplier),
        ]);
    }
}
