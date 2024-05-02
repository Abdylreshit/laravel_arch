<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\CreatePropertyController;
use Illuminate\Support\Facades\Route;

Route::post('admin/property/create', CreatePropertyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.create');
