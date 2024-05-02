<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\ListPropertyValueAttachedProductController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/value/list/attached_product', ListPropertyValueAttachedProductController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.list.attached_product');
