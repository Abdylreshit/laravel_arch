<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\CreateProductController;
use Illuminate\Support\Facades\Route;

Route::post('admin/product/create', CreateProductController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.create');
