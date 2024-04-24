<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\MenuFindItemController;
use Illuminate\Support\Facades\Route;

Route::get('admin/manager/warehouse/menu/find/item', MenuFindItemController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.warehouse.menu.find.item');
