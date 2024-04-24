<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\EditTreeController;
use Illuminate\Support\Facades\Route;

Route::put('admin/manager/warehouse/menu/edit/tree', EditTreeController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.warehouse.menu.edit.tree');
