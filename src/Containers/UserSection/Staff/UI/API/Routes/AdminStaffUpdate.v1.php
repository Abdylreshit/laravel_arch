<?php

use App\Containers\UserSection\Staff\UI\API\Controllers\StaffUpdateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/staff/{id}/update', StaffUpdateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.staff.update');
