<?php

use App\Containers\WarehouseSection\Warehouse\UI\API\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/warehouse/create', CreateController::class)
    ->middleware([
        'auth:admin',
        'permission:warehouse-create',
    ])
    ->name('admin.warehouse.create');
