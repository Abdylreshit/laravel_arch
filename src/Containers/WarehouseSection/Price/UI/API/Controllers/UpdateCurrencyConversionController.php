<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\UpdateCurrencyConversionAction;
use App\Containers\WarehouseSection\Price\UI\API\Requests\UpdateCurrencyConversionRequest;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyConversionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class UpdateCurrencyConversionController extends ApiController
{
    public function __invoke(UpdateCurrencyConversionRequest $request)
    {
        $currency = UpdateCurrencyConversionAction::run(
            $request->id,
            [
                'rate' => $request->rate,
                'valid_from' => $request->valid_from,
                'valid_to' => $request->valid_to,
                'is_active' => $request->is_active,
                'note' => $request->note,
            ]);

        return $this->successResponse([
            'currency_conversion' => new MainCurrencyConversionResource($currency),
        ]);
    }
}
