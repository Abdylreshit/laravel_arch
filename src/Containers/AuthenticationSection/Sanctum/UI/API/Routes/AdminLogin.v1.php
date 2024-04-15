<?php

use App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('admin/login', LoginController::class)->name('admin.login');
