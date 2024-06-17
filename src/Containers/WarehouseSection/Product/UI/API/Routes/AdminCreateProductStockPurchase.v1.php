<?php

use App\Containers\WarehouseSection\Product\UI\API\Controllers\CreateProductStockPurchaseController;
use Illuminate\Support\Facades\Route;

Route::post('admin/stock/purchase/create', CreateProductStockPurchaseController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.stock.purchase.create');
