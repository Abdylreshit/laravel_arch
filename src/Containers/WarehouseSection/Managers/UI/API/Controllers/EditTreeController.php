<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Containers\WarehouseSection\Managers\UI\API\Requests\EditTreeRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class EditTreeController extends ApiController
{
    public function __invoke(EditTreeRequest $request): JsonResponse
    {
        $manager = getMenuManager();

        $manager->editTree($request->all());

        return $this->accepted('ok');
    }
}
