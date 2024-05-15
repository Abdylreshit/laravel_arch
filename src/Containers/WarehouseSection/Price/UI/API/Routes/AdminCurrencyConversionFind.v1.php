<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\FindCurrencyConversionController;
use Illuminate\Support\Facades\Route;

Route::get('admin/currency/conversion{id}/find', FindCurrencyConversionController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.conversion.find');
