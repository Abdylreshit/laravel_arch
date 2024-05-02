<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\FindPropertyValueAction;
use Illuminate\Http\Request;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainPropertyValueResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class FindPropertyValueController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $property = FindPropertyValueAction::run($request->id);

        return $this->successResponse([
            'property_value' => new MainPropertyValueResource($property),
        ]);
    }
}
