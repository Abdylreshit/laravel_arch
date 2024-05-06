<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\CreatePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::post('admin/property/{propertyId}/value/create', CreatePropertyValueController::class)
    ->middleware([
        'auth:admin',
//        'permission:eav-create',
    ])
    ->name('admin.product.property.value.create');
