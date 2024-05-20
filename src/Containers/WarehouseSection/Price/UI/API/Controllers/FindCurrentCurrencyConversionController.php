<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\FindCurrentCurrencyConversionAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyConversionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class FindCurrentCurrencyConversionController extends ApiController
{
    public function __invoke(Request $request)
    {
        $currency = FindCurrentCurrencyConversionAction::run($request->currencyId);

        return $this->successResponse([
            'currency_conversion' => new MainCurrencyConversionResource($currency),
        ]);
    }
}
