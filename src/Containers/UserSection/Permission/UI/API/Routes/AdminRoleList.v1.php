<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\RoleListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/role/list', RoleListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.role.list');
