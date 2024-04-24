<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Controllers;

use App\Containers\WarehouseSection\Managers\Actions\ToTreeAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ToTreeController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $toTree = ToTreeAction::run();

        return $this->successResponse([
            'to_tree' => $toTree,
        ]);
    }
}
