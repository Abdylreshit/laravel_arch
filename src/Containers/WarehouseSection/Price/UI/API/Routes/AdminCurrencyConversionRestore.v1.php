<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\RestoreCurrencyConversionController;
use Illuminate\Support\Facades\Route;

Route::get('admin/currency/conversion/{id}/restore', RestoreCurrencyConversionController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.conversion.restore');
