<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\DeleteCurrencyAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class DeleteCurrencyController extends ApiController
{
    public function __invoke(Request $request)
    {
        DeleteCurrencyAction::run($request->id);

        return $this->noContent();
    }
}
