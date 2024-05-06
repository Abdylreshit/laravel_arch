<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Controllers;

use App\Containers\WarehouseSection\EAV\Actions\CreatePropertyValueAction;
use App\Containers\WarehouseSection\EAV\UI\API\Requests\CreatePropertyValueRequest;
use App\Containers\WarehouseSection\EAV\UI\API\Resources\MainPropertyValueResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreatePropertyValueController extends ApiController
{
    public function __invoke(CreatePropertyValueRequest $request): JsonResponse
    {
        $propertyValue = CreatePropertyValueAction::run([
            'property_id' => $request->propertyId,
            'name' => [
                'ru' => $request->input('name.ru') ?? null,
                'en' => $request->input('name.en') ?? null,
            ],
            'value' => $request->input('value') ?? null,
        ]);

        return $this->successResponse([
            'property_value' => new MainPropertyValueResource($propertyValue),
        ]);
    }
}
