<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/category/update', UpdateController::class)
    ->middleware([
        'auth:admin',
        'permission:category-update'
    ])
    ->name('admin.category.update');
