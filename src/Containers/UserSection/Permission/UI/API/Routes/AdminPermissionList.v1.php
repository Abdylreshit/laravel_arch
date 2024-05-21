<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\PermissionListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/permission/list', PermissionListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.permission.list');
