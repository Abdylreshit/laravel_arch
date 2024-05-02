<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Controllers;

use App\Containers\WarehouseSection\Supplier\Actions\FindAction;
use App\Containers\WarehouseSection\Supplier\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class FindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $id = $request->id;

        $supplier = FindAction::run($id);

        return $this->successResponse([
            'supplier' => new MainResource($supplier),
        ]);
    }
}
