<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\MenuDataController;
use Illuminate\Support\Facades\Route;

Route::get('admin/manager/warehouse/menu/data', MenuDataController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.warehouse.menu.data');
