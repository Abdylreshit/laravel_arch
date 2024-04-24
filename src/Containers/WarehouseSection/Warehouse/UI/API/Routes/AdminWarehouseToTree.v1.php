<?php

use App\Containers\WarehouseSection\Warehouse\UI\API\Controllers\ToTreeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/warehouse/to_tree', ToTreeController::class)
    ->middleware([
        'auth:admin',
        'permission:warehouse-find',
    ])
    ->name('admin.warehouse.to_tree');
