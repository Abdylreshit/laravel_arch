<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\RoleDeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/role/{id}/delete', RoleDeleteController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.role.delete');
