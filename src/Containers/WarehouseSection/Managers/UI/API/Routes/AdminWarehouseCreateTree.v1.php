<?php

use App\Containers\WarehouseSection\Managers\UI\API\Controllers\CreateTreeController;
use Illuminate\Support\Facades\Route;

Route::post('admin/manager/create/tree', CreateTreeController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.manager.create.tree');
