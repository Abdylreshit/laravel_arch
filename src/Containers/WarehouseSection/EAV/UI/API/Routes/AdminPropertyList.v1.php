<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\ListPropertyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/list', ListPropertyController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-find',
    ])
    ->name('admin.product.property.list');
