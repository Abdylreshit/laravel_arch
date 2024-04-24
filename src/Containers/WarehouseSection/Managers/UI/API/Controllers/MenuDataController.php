<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class MenuDataController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $manager = getMenuManager();

        $result = $manager->getMenu();

        return $this->successResponse($result);
    }
}
