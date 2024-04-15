<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/measurement_unit/create', CreateController::class)
    ->middleware([
        'auth:admin',
        'permission:measurementunit-create',
    ])
    ->name('admin.measurement_unit.create');
