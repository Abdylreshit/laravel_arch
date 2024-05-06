<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\CreatePropertyController;
use Illuminate\Support\Facades\Route;

Route::post('admin/property/create', CreatePropertyController::class)
    ->middleware([
        'auth:admin',
//        'permission:eav-create',
    ])
    ->name('admin.product.property.create');
