<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\CreateCurrencyAction;
use App\Containers\WarehouseSection\Price\UI\API\Requests\CreateCurrencyRequest;
use App\Containers\WarehouseSection\Price\UI\API\Resources\MainCurrencyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class CreateCurrencyController extends ApiController
{
    public function __invoke(CreateCurrencyRequest $request)
    {
        $currency = CreateCurrencyAction::run([
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
