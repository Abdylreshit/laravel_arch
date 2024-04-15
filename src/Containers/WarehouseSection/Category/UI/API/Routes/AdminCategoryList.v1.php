<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::post('admin/category/list', ListController::class)
    ->middleware([
        'auth:admin',
        'permission:category-find'
    ])
    ->name('admin.category.find');
