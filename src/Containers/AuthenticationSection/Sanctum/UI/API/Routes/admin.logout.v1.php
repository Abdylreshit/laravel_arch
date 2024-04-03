<?php

use App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin\LogoutController;
use Illuminate\Support\Facades\Route;

Route::post('admin/logout', LogoutController::class)->middleware('auth:admin');
