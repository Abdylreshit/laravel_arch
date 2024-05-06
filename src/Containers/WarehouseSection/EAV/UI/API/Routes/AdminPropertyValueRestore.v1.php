<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\RestorePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/value/{id}/restore', RestorePropertyValueController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-delete'
    ])
    ->name('admin.product.property.value.restore');
