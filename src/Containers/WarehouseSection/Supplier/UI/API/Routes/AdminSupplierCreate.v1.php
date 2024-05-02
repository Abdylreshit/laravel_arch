<?php

use App\Containers\WarehouseSection\Supplier\UI\API\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/supplier/create', CreateController::class)
    ->middleware([
        'auth:admin',
        'permission:supplier-create',
    ])
    ->name('admin.supplier.create');
