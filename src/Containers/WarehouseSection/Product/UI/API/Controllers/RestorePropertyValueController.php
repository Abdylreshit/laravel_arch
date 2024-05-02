<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\RestorePropertyValueAction;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class RestorePropertyValueController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        RestorePropertyValueAction::run($request->id);

        return $this->accepted('ok');
    }
}
