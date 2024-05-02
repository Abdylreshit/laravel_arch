<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\DeletePropertyValueAction;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeletePropertyValueController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        DeletePropertyValueAction::run($request->id);

        return $this->noContent();
    }
}
