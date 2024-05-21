<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\RoleCreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/role/create', RoleCreateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.role.list');
