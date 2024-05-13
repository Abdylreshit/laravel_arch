<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\CreateCurrencyConversionController;
use Illuminate\Support\Facades\Route;

Route::post('admin/currency/{currencyId}/conversion/create', CreateCurrencyConversionController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.conversion.create');
