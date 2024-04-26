<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Containers\WarehouseSection\Managers\UI\API\Requests\RestoreTreeRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MenuRestoreItemController extends ApiController
{
    public function __invoke(RestoreTreeRequest $request): JsonResponse
    {
        $manager = getMenuManager();

        $manager->restoreTree($request->all());

        return $this->accepted('ok');
    }
}
