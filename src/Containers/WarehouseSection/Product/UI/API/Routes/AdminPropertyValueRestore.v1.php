<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\RestorePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/{id}/value/restore', RestorePropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.restore');
