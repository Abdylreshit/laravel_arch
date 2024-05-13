<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\FindCurrencyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/currency/{id}/find', FindCurrencyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.find');
