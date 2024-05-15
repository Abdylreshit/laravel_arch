<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\CurrencyListAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\ListCurrencyResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class CurrencyListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,code,created_at
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,code,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $currencies = CurrencyListAction::run([
            'search' => $request->input('search'),
            'sort' => $request->input('sort'),
            'limit' => $request->input('limit'),
            'page' => $request->input('page'),
        ]);

        return $this->successResponse([
            'currencies' => new ListCurrencyResource($currencies),
        ]);
    }
}
