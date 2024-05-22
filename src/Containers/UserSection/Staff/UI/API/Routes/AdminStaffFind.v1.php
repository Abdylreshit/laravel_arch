<?php

use App\Containers\UserSection\Staff\UI\API\Controllers\StaffFindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/staff/{id}/find', StaffFindController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.staff.find');
