<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\CreateCurrencyConversionAction;
use App\Containers\WarehouseSection\Price\UI\API\Requests\CreateCurrencyConversionRequest;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyConversionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class CreateCurrencyConversionController extends ApiController
{
    public function __invoke(CreateCurrencyConversionRequest $request)
    {
        $currency = CreateCurrencyConversionAction::run(
            $request->currencyId,
            [
                'rate' => $request->input('rate'),
                'valid_from' => $request->input('valid_from'),
                'valid_to' => $request->input('valid_to'),
                'note' => $request->input('note'),
                'is_active' => $request->input('is_active'),
            ]);

        return $this->successResponse([
            'currency_conversion' => new MainCurrencyConversionResource($currency),
        ]);
    }
}
