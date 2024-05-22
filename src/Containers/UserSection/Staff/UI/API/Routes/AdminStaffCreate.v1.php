<?php

use App\Containers\UserSection\Staff\UI\API\Controllers\StaffCreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/staff/create', StaffCreateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.staff.create');
