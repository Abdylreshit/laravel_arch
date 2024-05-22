<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\RoleUpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/role/{id}/update', RoleUpdateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.role.update');
