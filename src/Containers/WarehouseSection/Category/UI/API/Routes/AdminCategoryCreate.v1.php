<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/category/create', CreateController::class)
    ->middleware([
        'auth:admin',
        'permission:category-create'
    ])
    ->name('admin.category.create');
