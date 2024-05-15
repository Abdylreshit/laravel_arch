<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\RestoreCurrencyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/currency/{id}/restore', RestoreCurrencyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.restore');
