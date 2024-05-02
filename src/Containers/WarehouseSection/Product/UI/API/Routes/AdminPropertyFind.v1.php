<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\FindPropertyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/{id}/find', FindPropertyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.find');
