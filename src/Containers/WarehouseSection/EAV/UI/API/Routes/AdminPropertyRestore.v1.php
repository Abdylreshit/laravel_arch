<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\RestorePropertyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/{id}/restore', RestorePropertyController::class)
    ->middleware([
        'auth:admin',
//        'permission:eav-delete'
    ])
    ->name('admin.product.property.restore');
