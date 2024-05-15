<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Controllers;

use App\Containers\WarehouseSection\Price\Actions\CurrencyConversionListAction;
use App\Containers\WarehouseSection\Price\UI\API\Resources\ListCurrencyConversionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class CurrencyConversionListController extends ApiController
{
    /**
     * @LRDparam valid_from nullable|date
     * @LRDparam valid_to nullable|date
     * @LRDparam sort nullable|string|in:id,created_at
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'valid_from' => 'nullable|date',
            'valid_to' => 'nullable|date',
            'sort' => 'nullable|string|in:id,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $currencies = CurrencyConversionListAction::run(
            $request->currencyId,
            [
                'valid_from' => $request->input('valid_from'),
                'valid_to' => $request->input('valid_to'),
                'sort' => $request->input('sort'),
                'limit' => $request->input('limit'),
                'page' => $request->input('page'),
            ]
        );

        return $this->successResponse([
            'currency_conversions' => new ListCurrencyConversionResource($currencies),
        ]);
    }
}
