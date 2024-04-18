<?php

use App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin\MeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/me', MeController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.me');
