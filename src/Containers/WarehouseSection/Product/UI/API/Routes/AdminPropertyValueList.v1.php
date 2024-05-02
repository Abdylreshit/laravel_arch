<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\ListPropertyValueController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/value/list', ListPropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.list');
