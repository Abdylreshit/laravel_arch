<?php

use App\Containers\WarehouseSection\Supplier\UI\API\Controllers\FindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/supplier/{id}/find', FindController::class)
    ->middleware([
        'auth:admin',
        'permission:supplier-find',
    ])
    ->name('admin.supplier.find');
