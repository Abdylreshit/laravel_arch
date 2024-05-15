<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\DeleteCurrencyConversionController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/currency/conversion/{id}/delete', DeleteCurrencyConversionController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.conversion.delete');
