<?php

use App\Containers\WarehouseSection\Supplier\UI\API\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/supplier/{id}/update', UpdateController::class)
    ->middleware([
        'auth:admin',
        'permission:supplier-update',
    ])
    ->name('admin.supplier.update');
