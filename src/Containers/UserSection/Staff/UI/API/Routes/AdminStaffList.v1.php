<?php

use App\Containers\UserSection\Staff\UI\API\Controllers\StaffListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/staff/list', StaffListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.staff.list');
