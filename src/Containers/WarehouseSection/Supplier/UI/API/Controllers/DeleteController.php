<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Controllers;

use App\Containers\WarehouseSection\Supplier\Actions\DeleteAction;
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
