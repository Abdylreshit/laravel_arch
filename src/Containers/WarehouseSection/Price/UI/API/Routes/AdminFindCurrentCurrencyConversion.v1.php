<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\FindCurrentCurrencyConversionController;
use Illuminate\Support\Facades\Route;

Route::post('admin/currency/{currencyId}/current/conversion', FindCurrentCurrencyConversionController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.find.current.conversion');
