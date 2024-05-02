<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\FindPropertyValueController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/{id}/find', FindPropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.find');
