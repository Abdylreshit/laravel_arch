<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Controllers;

use App\Containers\WarehouseSection\EAV\Actions\FindPropertyAction;
use Illuminate\Http\Request;
use App\Containers\WarehouseSection\EAV\UI\API\Resources\MainPropertyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class FindPropertyController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $property = FindPropertyAction::run($request->id);

        return $this->successResponse([
            'property' => new MainPropertyResource($property),
        ]);
    }
}
