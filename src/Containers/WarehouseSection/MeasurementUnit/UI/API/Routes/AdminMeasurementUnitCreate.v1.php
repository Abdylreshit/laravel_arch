<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementCreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/measurement/{measurementId}/measurement_unit/create', MeasurementCreateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.create');
