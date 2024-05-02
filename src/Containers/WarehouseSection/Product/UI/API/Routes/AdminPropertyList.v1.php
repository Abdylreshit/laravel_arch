<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\ListPropertyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/list', ListPropertyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.list');
