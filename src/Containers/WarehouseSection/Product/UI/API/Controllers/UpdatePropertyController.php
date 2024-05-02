<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\UpdatePropertyAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\UpdatePropertyRequest;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainPropertyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdatePropertyController extends ApiController
{
    public function __invoke(UpdatePropertyRequest $request): JsonResponse
    {
        $property = UpdatePropertyAction::run([
            'id' => $request->id,
            'name' => [
                'ru' => $request->input('name.ru'),
                'en' => $request->input('name.en'),
            ]
        ]);

        return $this->successResponse([
            'property' => new MainPropertyResource($property),
        ]);
    }
}
