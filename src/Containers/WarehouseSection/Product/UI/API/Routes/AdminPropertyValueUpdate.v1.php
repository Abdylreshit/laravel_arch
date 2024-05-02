<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\UpdatePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::put('admin/property/value/{id}/update', UpdatePropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.update');
