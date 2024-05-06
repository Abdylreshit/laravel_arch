<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Controllers;

use App\Containers\WarehouseSection\EAV\Actions\RestorePropertyAction;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class RestorePropertyController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        RestorePropertyAction::run($request->id);

        return $this->accepted('ok');
    }
}
