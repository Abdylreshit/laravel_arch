<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\RestorePropertyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/{id}/restore', RestorePropertyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.restore');
