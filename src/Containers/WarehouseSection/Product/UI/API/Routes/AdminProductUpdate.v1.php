<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\UpdateProductController;
use Illuminate\Support\Facades\Route;

Route::put('admin/product/{id}/update', UpdateProductController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.update');
