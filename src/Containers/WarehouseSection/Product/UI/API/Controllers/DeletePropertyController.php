<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\DeletePropertyAction;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeletePropertyController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        DeletePropertyAction::run($request->id);

        return $this->noContent();
    }
}
