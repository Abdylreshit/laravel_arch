<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\DeletePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/property/value/{id}/delete', DeletePropertyValueController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.value.delete');
