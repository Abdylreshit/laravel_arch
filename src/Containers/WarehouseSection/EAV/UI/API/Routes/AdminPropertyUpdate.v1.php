<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\UpdatePropertyController;
use Illuminate\Support\Facades\Route;

Route::put('admin/property/{id}/update', UpdatePropertyController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-update'
    ])
    ->name('admin.product.property.update');
