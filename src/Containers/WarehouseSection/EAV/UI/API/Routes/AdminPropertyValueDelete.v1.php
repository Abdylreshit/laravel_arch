<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\DeletePropertyValueController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/property/value/{id}/delete', DeletePropertyValueController::class)
    ->middleware([
        'auth:admin',
//        'permission:eav-delete'
    ])
    ->name('admin.product.property.value.delete');
