<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Controllers;

use App\Containers\WarehouseSection\EAV\Actions\CreatePropertyAction;
use App\Containers\WarehouseSection\EAV\UI\API\Requests\CreatePropertyRequest;
use App\Containers\WarehouseSection\EAV\UI\API\Resources\MainPropertyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreatePropertyController extends ApiController
{

    public function __invoke(CreatePropertyRequest $request): JsonResponse
    {
        $property = CreatePropertyAction::run([
            'name' => [
                'ru' => $request->input('name.ru'),
                'en' => $request->input('name.en'),
            ],
            'type' => $request->input('type'),
        ]);

        return $this->successResponse([
            'property' => new MainPropertyResource($property),
        ]);
    }
}
