<?php

use App\Containers\WarehouseSection\Category\UI\API\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/category/{id}/delete', DeleteController::class)
    ->middleware([
        'auth:admin',
        'permission:category-delete'
    ])
    ->name('admin.category.delete');
