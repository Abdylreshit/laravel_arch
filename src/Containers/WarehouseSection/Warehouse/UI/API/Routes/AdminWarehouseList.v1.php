<?php

use App\Containers\WarehouseSection\Warehouse\UI\API\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/warehouse/list', ListController::class)
    ->middleware([
        'auth:admin',
        'permission:warehouse-find',
    ])
    ->name('admin.warehouse.list');
