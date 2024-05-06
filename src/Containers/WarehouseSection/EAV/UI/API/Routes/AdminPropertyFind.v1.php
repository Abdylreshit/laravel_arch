<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\FindPropertyController;
use Illuminate\Support\Facades\Route;

Route::get('admin/property/{id}/find', FindPropertyController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-find',
    ])
    ->name('admin.product.property.find');
