<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\FindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/measurement_unit/{id}/find', FindController::class)
    ->middleware([
        'auth:admin',
        'permission:measurementunit-find',
    ])
    ->name('admin.measurement_unit.find');
