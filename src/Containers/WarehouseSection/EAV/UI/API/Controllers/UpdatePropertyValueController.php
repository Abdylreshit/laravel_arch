<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Controllers;

use App\Containers\WarehouseSection\EAV\Actions\UpdatePropertyValueAction;
use App\Containers\WarehouseSection\EAV\UI\API\Requests\UpdatePropertyValueRequest;
use App\Containers\WarehouseSection\EAV\UI\API\Resources\MainPropertyValueResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdatePropertyValueController extends ApiController
{
    public function __invoke(UpdatePropertyValueRequest $request): JsonResponse
    {
        $propertyValue = UpdatePropertyValueAction::run([
            'id' => $request->id,
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
