<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\FindCurrencyConversionAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyConversionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class FindCurrencyConversionController extends ApiController
{
    public function __invoke(Request $request)
    {
        $currency = FindCurrencyConversionAction::run($request->id);

        return $this->successResponse([
            'currency_conversion' => new MainCurrencyConversionResource($currency),
        ]);
    }
}
