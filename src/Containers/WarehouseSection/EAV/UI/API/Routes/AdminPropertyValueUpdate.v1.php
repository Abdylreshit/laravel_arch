<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\UpdatePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::put('admin/property/value/{id}/update', UpdatePropertyValueController::class)
    ->middleware([
        'auth:admin',
//        'permission:eav-update'
    ])
    ->name('admin.product.property.value.update');
