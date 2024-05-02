<?php

use App\Containers\WarehouseSection\Supplier\UI\API\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/supplier/{id}/delete', DeleteController::class)
    ->middleware([
        'auth:admin',
        'permission:supplier-delete',
    ])
    ->name('admin.supplier.delete');
