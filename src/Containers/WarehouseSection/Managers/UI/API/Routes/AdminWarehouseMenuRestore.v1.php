<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\MenuRestoreItemController;
use Illuminate\Support\Facades\Route;

Route::get('admin/warehouse/filter/tree/restore', MenuRestoreItemController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.warehouse.menu.restore');
