<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\CreatePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::post('admin/property/{propertyId}/value/create', CreatePropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.create');
