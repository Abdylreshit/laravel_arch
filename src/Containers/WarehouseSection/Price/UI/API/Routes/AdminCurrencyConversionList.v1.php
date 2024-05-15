<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\CurrencyConversionListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/currency/{currencyId}/conversion/list', CurrencyConversionListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.conversion.list');
