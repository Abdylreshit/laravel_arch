<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\MenuDataController;
use Illuminate\Support\Facades\Route;

Route::get('admin/warehouse/filters', MenuDataController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.warehouse.menu.data');
