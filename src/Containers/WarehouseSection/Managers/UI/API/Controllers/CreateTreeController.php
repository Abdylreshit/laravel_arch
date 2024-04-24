<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Containers\WarehouseSection\Managers\UI\API\Requests\CreateTreeRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateTreeController extends ApiController
{
    public function __invoke(CreateTreeRequest $request): JsonResponse
    {
        $manager = getMenuManager();

        $manager->createTree($request->all());

        return $this->accepted('ok');
    }
}
