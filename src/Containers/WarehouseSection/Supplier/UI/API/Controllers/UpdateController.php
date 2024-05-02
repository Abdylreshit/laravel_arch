<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Controllers;

use App\Containers\WarehouseSection\Supplier\Actions\UpdateAction;
use App\Containers\WarehouseSection\Supplier\UI\API\Requests\UpdateRequest;
use App\Containers\WarehouseSection\Supplier\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateController extends ApiController
{
    public function __invoke(UpdateRequest $request): JsonResponse
    {
        $id = $request->id;

        $supplier = UpdateAction::run([
            'id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
        ]);

        return $this->successResponse([
            'supplier' => new MainResource($supplier),
        ]);
    }
}
