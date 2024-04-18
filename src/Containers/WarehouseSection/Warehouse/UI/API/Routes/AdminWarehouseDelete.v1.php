<?php

use App\Containers\WarehouseSection\Warehouse\UI\API\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/warehouse/{id}/delete', DeleteController::class)
    ->middleware([
        'auth:admin',
        'permission:warehouse-delete',
    ])
    ->name('admin.warehouse.delete');
