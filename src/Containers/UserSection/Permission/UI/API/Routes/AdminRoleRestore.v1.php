<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\RoleRestoreController;
use Illuminate\Support\Facades\Route;

Route::get('admin/role/{id}/restore', RoleRestoreController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.role.restore');
