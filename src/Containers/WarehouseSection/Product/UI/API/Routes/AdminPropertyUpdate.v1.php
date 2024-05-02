<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\UpdatePropertyController;
use Illuminate\Support\Facades\Route;

Route::put('admin/property/{id}/update', UpdatePropertyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.update');
