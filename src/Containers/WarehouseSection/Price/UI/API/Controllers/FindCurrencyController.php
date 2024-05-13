<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\FindCurrencyAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class FindCurrencyController extends ApiController
{
    public function __invoke(Request $request)
    {
        $currency = FindCurrencyAction::run($request->id);

        return $this->successResponse([
            'currency' => new MainCurrencyResource($currency),
        ]);
    }
}
