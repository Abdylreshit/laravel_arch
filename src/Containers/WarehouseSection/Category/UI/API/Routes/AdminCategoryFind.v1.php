<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\FindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/category/{id}/find', FindController::class)
    ->middleware([
        'auth:admin',
        'permission:category-find',
    ])
    ->name('admin.category.find');
