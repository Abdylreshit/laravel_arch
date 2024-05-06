<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\FindPropertyValueController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/value/{id}/find', FindPropertyValueController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-find',
    ])
    ->name('admin.product.property.value.find');
