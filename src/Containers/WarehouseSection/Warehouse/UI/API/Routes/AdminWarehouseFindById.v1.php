<?php

use App\Containers\WarehouseSection\Warehouse\UI\API\Controllers\FindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/warehouse/{id}/find', FindController::class)
    ->middleware([
        'auth:admin',
        'permission:warehouse-find',
    ])
    ->name('admin.warehouse.find');
