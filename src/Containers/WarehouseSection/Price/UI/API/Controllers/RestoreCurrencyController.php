<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\RestoreCurrencyAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class RestoreCurrencyController extends ApiController
{
    public function __invoke(Request $request)
    {
        $currency = RestoreCurrencyAction::run($request->id);

        return $this->successResponse([
            'currency' => new MainCurrencyResource($currency),
        ]);
    }
}
