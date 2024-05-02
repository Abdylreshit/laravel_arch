<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\ListPropertyValueAttachedProductAction;
use App\Containers\WarehouseSection\Product\UI\API\Resources\ListPropertyValueAttachedProductResource;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListPropertyValueAttachedProductController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $propertyValues = ListPropertyValueAttachedProductAction::run();

        return $this->successResponse(ListPropertyValueAttachedProductResource::collection($propertyValues));
    }
}
