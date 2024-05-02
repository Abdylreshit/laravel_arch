<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\CreatePropertyValueAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\CreatePropertyValueRequest;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainPropertyValueResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreatePropertyValueController extends ApiController
{
    public function __invoke(CreatePropertyValueRequest $request): JsonResponse
    {
        $propertyValue = CreatePropertyValueAction::run([
            'property_id' => $request->property_id,
            'value' => [
                'ru' => $request->value['ru'],
                'en' => $request->value['en'],
            ],
        ]);

        return $this->successResponse([
            'property_value' => new MainPropertyValueResource($propertyValue),
        ]);
    }
}
