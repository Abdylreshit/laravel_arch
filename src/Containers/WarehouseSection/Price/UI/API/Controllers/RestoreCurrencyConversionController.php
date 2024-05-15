<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\RestoreCurrencyConversionAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyConversionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class RestoreCurrencyConversionController extends ApiController
{
    public function __invoke(Request $request)
    {
        $currencyConversion = RestoreCurrencyConversionAction::run($request->id);

        return $this->successResponse([
            'currency_conversion' => new MainCurrencyConversionResource($currencyConversion),
        ]);
    }
}
