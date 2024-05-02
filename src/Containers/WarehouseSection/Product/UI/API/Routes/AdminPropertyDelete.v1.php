<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\DeletePropertyController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/property/{id}/delete', DeletePropertyController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.property.delete');
