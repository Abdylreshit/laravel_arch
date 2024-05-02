<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\UpdatePropertyValueAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\UpdatePropertyValueRequest;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainPropertyValueResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdatePropertyValueController extends ApiController
{
    public function __invoke(UpdatePropertyValueRequest $request): JsonResponse
    {
        $propertyValue = UpdatePropertyValueAction::run([
            'id' => $request->id,
            'value' => [
                'ru' => $request->input('value.ru'),
                'en' => $request->input('value.en'),
            ]
        ]);

        return $this->successResponse([
            'property_value' => new MainPropertyValueResource($propertyValue),
        ]);
    }
}
