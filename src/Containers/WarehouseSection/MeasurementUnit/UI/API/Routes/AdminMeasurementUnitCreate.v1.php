<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementUnitCreateController;
use Illuminate\Support\Facades\Route;

Route::post('admin/measurement/{measurementId}/measurement_unit/create', MeasurementUnitCreateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.create');
