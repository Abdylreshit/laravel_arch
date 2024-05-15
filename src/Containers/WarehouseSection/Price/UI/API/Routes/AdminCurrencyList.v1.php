<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\CurrencyListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/currency/list', CurrencyListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.list');
