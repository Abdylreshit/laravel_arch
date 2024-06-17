<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\ProductStockController;
use Illuminate\Support\Facades\Route;

Route::get('admin/product/{id}/stock', ProductStockController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.stock');
