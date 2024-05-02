<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\UpdatePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::put('admin/property/{id}/value/update', UpdatePropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.update');
