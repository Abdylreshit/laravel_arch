<?php

use App\Containers\WarehouseSection\Warehouse\UI\API\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/warehouse/{id}/update', UpdateController::class)
    ->middleware([
        'auth:admin',
        'permission:warehouse-update',
    ])
    ->name('admin.warehouse.update');
