<?php

use App\Containers\WarehouseSection\EAV\UI\API\Controllers\DeletePropertyController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/property/{id}/delete', DeletePropertyController::class)
    ->middleware([
        'auth:admin',
        'permission:eav-delete'
    ])
    ->name('admin.product.property.delete');
