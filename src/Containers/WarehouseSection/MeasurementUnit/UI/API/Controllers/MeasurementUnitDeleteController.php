<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\MeasurementDeleteAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class MeasurementUnitDeleteController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        MeasurementDeleteAction::run($request->id);

        return $this->noContent();
    }
}
