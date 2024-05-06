<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\ListPropertyValueController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/value/list', ListPropertyValueController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-find',
    ])
    ->name('admin.product.property.value.list');
