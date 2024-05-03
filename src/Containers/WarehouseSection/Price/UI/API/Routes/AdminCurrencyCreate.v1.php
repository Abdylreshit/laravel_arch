<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\CreateCurrencyController;
use Illuminate\Support\Facades\Route;

Route::post('admin/currency/create', CreateCurrencyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.create');
