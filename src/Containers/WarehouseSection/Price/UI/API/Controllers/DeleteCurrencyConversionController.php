<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\DeleteCurrencyConversionAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class DeleteCurrencyConversionController extends ApiController
{
    public function __invoke(Request $request)
    {
        DeleteCurrencyConversionAction::run($request->id);

        return $this->noContent();
    }
}
