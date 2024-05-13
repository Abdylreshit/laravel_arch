<?php

use App\Containers\WarehouseSection\Price\UI\API\Controllers\DeleteCurrencyController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/currency/{id}/delete', DeleteCurrencyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.currency.delete');
