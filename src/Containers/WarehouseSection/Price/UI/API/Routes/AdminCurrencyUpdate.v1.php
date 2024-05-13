<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\UpdateCurrencyController;
use Illuminate\Support\Facades\Route;

Route::put('admin/currency/{id}/update', UpdateCurrencyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.update');
