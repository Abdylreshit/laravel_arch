<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Containers\WarehouseSection\Managers\UI\API\Requests\FindMenuItemRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MenuFindItemController extends ApiController
{
    public function __invoke(FindMenuItemRequest $request): JsonResponse
    {
        $manager = getMenuManager();

        $result = $manager->findMenuItem($request->all());

        return $this->successResponse($result);
    }
}
