<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\MoveController;
use Illuminate\Support\Facades\Route;

Route::post('admin/category/move', MoveController::class)
    ->middleware([
        'auth:admin',
        'permission:category-update'
    ])
    ->name('admin.category.move');
