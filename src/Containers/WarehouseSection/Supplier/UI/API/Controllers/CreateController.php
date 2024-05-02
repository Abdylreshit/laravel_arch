<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Controllers;

use App\Containers\WarehouseSection\Supplier\Actions\CreateAction;
use App\Containers\WarehouseSection\Supplier\UI\API\Requests\CreateRequest;
use App\Containers\WarehouseSection\Supplier\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateController extends ApiController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        $supplier = CreateAction::run($request->toArray());

        return $this->successResponse([
            'supplier' => new MainResource($supplier),
        ]);
    }
}
