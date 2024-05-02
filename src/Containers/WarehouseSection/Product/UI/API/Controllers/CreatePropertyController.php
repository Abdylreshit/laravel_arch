<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\CreatePropertyAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\CreatePropertyRequest;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainPropertyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreatePropertyController extends ApiController
{
    public function __invoke(CreatePropertyRequest $request): JsonResponse
    {
        $property = CreatePropertyAction::run([
            'name' => [
                'ru' => $request->name['ru'],
                'en' => $request->name['en'],
            ],
        ]);

        return $this->successResponse([
            'property' => new MainPropertyResource($property),
        ]);
    }
}
