<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\UpdateCurrencyConversionController;
use Illuminate\Support\Facades\Route;

Route::put('admin/currency/conversion{id}/update', UpdateCurrencyConversionController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.conversion.update');
