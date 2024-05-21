<?php

use App\Containers\UserSection\Permission\UI\API\Controllers\RoleFindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/role/{id}/find', RoleFindController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.role.find');
