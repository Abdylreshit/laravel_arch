<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\DeleteAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class DeleteController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        DeleteAction::run($request->id);

        return $this->noContent();
    }
}
