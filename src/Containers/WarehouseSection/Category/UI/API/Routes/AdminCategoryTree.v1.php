<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\TreeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/category/tree', TreeController::class)
    ->middleware([
        'auth:admin',
        'permission:category-find',
    ])
    ->name('admin.category.tree');
