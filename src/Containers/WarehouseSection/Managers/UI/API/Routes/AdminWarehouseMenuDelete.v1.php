<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\DeleteTreeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/warehouse/filter/tree/delete', DeleteTreeController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.warehouse.menu.data');
