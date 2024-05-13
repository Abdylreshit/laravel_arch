<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/product/list', ProductListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.list');
