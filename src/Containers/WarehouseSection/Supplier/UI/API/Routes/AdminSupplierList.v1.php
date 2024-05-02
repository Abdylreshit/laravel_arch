<?php

use App\Containers\WarehouseSection\Supplier\UI\API\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/supplier/list', ListController::class)
    ->middleware([
        'auth:admin',
        'permission:supplier-find',
    ])
    ->name('admin.supplier.list');
