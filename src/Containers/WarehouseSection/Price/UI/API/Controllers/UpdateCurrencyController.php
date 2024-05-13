<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\UpdateCurrencyAction;
use App\Containers\WarehouseSection\Price\UI\API\Requests\UpdateCurrencyRequest;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class UpdateCurrencyController extends ApiController
{
    public function __invoke(UpdateCurrencyRequest $request)
    {
        $currency = UpdateCurrencyAction::run(
            $request->id,
            [
                'name' => [
                    'ru' => $request->input('name.ru'),
                    'en' => $request->input('name.en'),
                ],
                'code' => $request->input('code'),
                'symbol' => $request->input('symbol'),
            ]);

        return $this->successResponse([
            'currency' => new MainCurrencyResource($currency),
        ]);
    }
}
