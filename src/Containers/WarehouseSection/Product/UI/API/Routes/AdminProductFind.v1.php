<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\ProductFindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/product/{id}/find', ProductFindController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.product.find');
