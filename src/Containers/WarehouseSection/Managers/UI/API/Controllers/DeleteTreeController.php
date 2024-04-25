<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Controllers;

use App\Containers\WarehouseSection\Managers\UI\API\Requests\DeleteTreeRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeleteTreeController extends ApiController
{
    public function __invoke(DeleteTreeRequest $request): JsonResponse
    {
        $manager = getMenuManager();

        $manager->deleteTree($request->all());

        return $this->accepted('ok');
    }
}
